<?php

namespace App\SEO\Audit;

use DOMDocument;
use DOMElement;
use DOMXPath;

class HtmlPageAnalyzer
{
    public function analyze(string $uri, int $status, array $headers, string $html, float $serverProcessingMs): array
    {
        $normalizedHeaders = [];
        foreach ($headers as $key => $value) {
            $normalizedHeaders[strtolower((string) $key)] = is_array($value) ? implode(', ', $value) : (string) $value;
        }

        $document = $this->toDom($html);

        $title = $this->getTitle($document);
        $metaDescription = $this->getMetaByName($document, 'description');
        $metaRobots = $this->getMetaByName($document, 'robots');
        $canonical = $this->getCanonical($document);
        $viewport = $this->getMetaByName($document, 'viewport');

        $headings = $this->getHeadings($document);
        $images = $this->getImages($document);
        $links = $this->getLinks($document);

        $openGraph = $this->getMetaByPropertyPrefix($document, 'og:');
        $twitter = $this->getMetaByNamePrefix($document, 'twitter:');
        $hreflang = $this->getHreflang($document);
        $schema = $this->getSchema($document);

        $domElementsCount = $this->countElements($document);
        $assets = $this->getAssetSignals($document);
        $semantic = $this->getSemanticSignals($document);

        return [
            'uri' => $uri,
            'status' => $status,
            'server_processing_ms' => (int) round($serverProcessingMs),
            'headers' => [
                'content_type' => $normalizedHeaders['content-type'] ?? null,
                'cache_control' => $normalizedHeaders['cache-control'] ?? null,
                'content_security_policy' => $normalizedHeaders['content-security-policy'] ?? null,
                'x_robots_tag' => $normalizedHeaders['x-robots-tag'] ?? null,
            ],
            'meta' => [
                'title' => $title,
                'description' => $metaDescription,
                'robots' => $metaRobots,
                'canonical' => $canonical,
                'viewport' => $viewport,
                'open_graph' => $openGraph,
                'twitter' => $twitter,
                'hreflang' => $hreflang,
            ],
            'headings' => $headings,
            'schema' => $schema,
            'links' => $links,
            'images' => $images,
            'performance_signals' => [
                'dom_elements' => $domElementsCount,
                'assets' => $assets,
            ],
            'semantic_signals' => $semantic,
        ];
    }

    private function toDom(string $html): ?DOMDocument
    {
        if (trim($html) === '') {
            return null;
        }

        $previous = libxml_use_internal_errors(true);

        $document = new DOMDocument();
        $document->preserveWhiteSpace = false;
        $document->formatOutput = false;

        $loaded = $document->loadHTML($html, LIBXML_NOWARNING | LIBXML_NOERROR);

        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        return $loaded ? $document : null;
    }

    private function xpath(?DOMDocument $document): ?DOMXPath
    {
        if (!$document) {
            return null;
        }

        return new DOMXPath($document);
    }

    private function getTitle(?DOMDocument $document): ?string
    {
        if (!$document) {
            return null;
        }

        $titles = $document->getElementsByTagName('title');
        if ($titles->length === 0) {
            return null;
        }

        return $this->normalizeText($titles->item(0)?->textContent);
    }

    private function getMetaByName(?DOMDocument $document, string $name): ?string
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return null;
        }

        $nodes = $xpath->query("//meta[translate(@name,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='".strtolower($name)."']/@content");

        return $nodes && $nodes->length > 0 ? $this->normalizeText($nodes->item(0)?->nodeValue) : null;
    }

    private function getCanonical(?DOMDocument $document): ?string
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return null;
        }

        $nodes = $xpath->query("//link[translate(@rel,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='canonical']/@href");

        return $nodes && $nodes->length > 0 ? trim((string) $nodes->item(0)?->nodeValue) : null;
    }

    private function getMetaByPropertyPrefix(?DOMDocument $document, string $prefix): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return [];
        }

        $nodes = $xpath->query("//meta[starts-with(@property, '".$prefix."')]");
        if (!$nodes) {
            return [];
        }

        $result = [];
        foreach ($nodes as $node) {
            if (!$node instanceof DOMElement) {
                continue;
            }

            $property = trim((string) $node->getAttribute('property'));
            if ($property === '') {
                continue;
            }

            $result[$property] = $this->normalizeText($node->getAttribute('content')) ?: null;
        }

        return $result;
    }

    private function getMetaByNamePrefix(?DOMDocument $document, string $prefix): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return [];
        }

        $nodes = $xpath->query("//meta[starts-with(translate(@name,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz'), '".strtolower($prefix)."')]");
        if (!$nodes) {
            return [];
        }

        $result = [];
        foreach ($nodes as $node) {
            if (!$node instanceof DOMElement) {
                continue;
            }

            $name = trim((string) $node->getAttribute('name'));
            if ($name === '') {
                continue;
            }

            $result[strtolower($name)] = $this->normalizeText($node->getAttribute('content')) ?: null;
        }

        return $result;
    }

    private function getHreflang(?DOMDocument $document): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return [];
        }

        $nodes = $xpath->query("//link[translate(@rel,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='alternate' and @hreflang]");
        if (!$nodes) {
            return [];
        }

        $items = [];
        foreach ($nodes as $node) {
            if (!$node instanceof DOMElement) {
                continue;
            }

            $lang = trim((string) $node->getAttribute('hreflang'));
            $href = trim((string) $node->getAttribute('href'));
            if ($lang === '' || $href === '') {
                continue;
            }

            $items[] = ['hreflang' => strtolower($lang), 'href' => $href];
        }

        return $items;
    }

    private function getHeadings(?DOMDocument $document): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return [
                'h1' => [],
                'h2' => [],
                'h3' => [],
                'h4' => [],
                'h5' => [],
                'h6' => [],
            ];
        }

        $result = [];
        foreach (['h1', 'h2', 'h3', 'h4', 'h5', 'h6'] as $tag) {
            $nodes = $xpath->query('//'.$tag);
            $values = [];

            if ($nodes) {
                foreach ($nodes as $node) {
                    $values[] = $this->normalizeText($node->textContent) ?: '';
                }
            }

            $result[$tag] = array_values(array_filter($values, fn ($v) => $v !== ''));
        }

        return $result;
    }

    private function getImages(?DOMDocument $document): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return ['count' => 0, 'missing_alt' => 0, 'items' => []];
        }

        $nodes = $xpath->query('//img');
        if (!$nodes) {
            return ['count' => 0, 'missing_alt' => 0, 'items' => []];
        }

        $items = [];
        $missingAlt = 0;

        foreach ($nodes as $node) {
            if (!$node instanceof DOMElement) {
                continue;
            }

            $src = trim((string) $node->getAttribute('src'));
            $alt = $this->normalizeText($node->getAttribute('alt'));
            $loading = strtolower(trim((string) $node->getAttribute('loading')));
            $width = trim((string) $node->getAttribute('width'));
            $height = trim((string) $node->getAttribute('height'));

            $hasAlt = $alt !== null && $alt !== '';
            if (!$hasAlt) {
                $missingAlt++;
            }

            $items[] = [
                'src' => $src !== '' ? $src : null,
                'alt' => $hasAlt ? $alt : null,
                'loading' => $loading !== '' ? $loading : null,
                'width' => $width !== '' ? $width : null,
                'height' => $height !== '' ? $height : null,
            ];
        }

        return [
            'count' => count($items),
            'missing_alt' => $missingAlt,
            'items' => array_slice($items, 0, 50),
        ];
    }

    private function getLinks(?DOMDocument $document): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return ['count' => 0, 'items' => []];
        }

        $nodes = $xpath->query('//a[@href]');
        if (!$nodes) {
            return ['count' => 0, 'items' => []];
        }

        $items = [];
        foreach ($nodes as $node) {
            if (!$node instanceof DOMElement) {
                continue;
            }

            $href = trim((string) $node->getAttribute('href'));
            $text = $this->normalizeText($node->textContent);

            $rel = strtolower(trim((string) $node->getAttribute('rel')));
            $target = strtolower(trim((string) $node->getAttribute('target')));

            $items[] = [
                'href' => $href,
                'text' => $text,
                'rel' => $rel !== '' ? $rel : null,
                'target' => $target !== '' ? $target : null,
            ];
        }

        return [
            'count' => count($items),
            'items' => array_slice($items, 0, 200),
        ];
    }

    private function getSchema(?DOMDocument $document): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return ['count' => 0, 'valid_json' => 0, 'items' => []];
        }

        $nodes = $xpath->query("//script[translate(@type,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='application/ld+json']");
        if (!$nodes) {
            return ['count' => 0, 'valid_json' => 0, 'items' => []];
        }

        $items = [];
        $valid = 0;

        foreach ($nodes as $node) {
            $raw = trim((string) $node->textContent);
            if ($raw === '') {
                continue;
            }

            $decoded = json_decode($raw, true);
            $ok = json_last_error() === JSON_ERROR_NONE && is_array($decoded);

            if ($ok) {
                $valid++;
            }

            $items[] = [
                'is_valid_json' => $ok,
                'has_context' => $ok ? isset($decoded['@context']) : false,
                'has_type' => $ok ? isset($decoded['@type']) : false,
            ];
        }

        return [
            'count' => count($items),
            'valid_json' => $valid,
            'items' => array_slice($items, 0, 10),
        ];
    }

    private function countElements(?DOMDocument $document): int
    {
        if (!$document) {
            return 0;
        }

        return $document->getElementsByTagName('*')->length ?? 0;
    }

    private function getAssetSignals(?DOMDocument $document): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return [
                'stylesheets' => 0,
                'scripts' => 0,
                'inline_scripts' => 0,
                'preconnect' => 0,
                'preload' => 0,
            ];
        }

        $stylesheets = $xpath->query("//link[translate(@rel,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='stylesheet']");
        $scripts = $xpath->query('//script');
        $inlineScripts = $xpath->query('//script[not(@src)]');
        $preconnect = $xpath->query("//link[translate(@rel,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='preconnect']");
        $preload = $xpath->query("//link[translate(@rel,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='preload']");

        return [
            'stylesheets' => $stylesheets ? $stylesheets->length : 0,
            'scripts' => $scripts ? $scripts->length : 0,
            'inline_scripts' => $inlineScripts ? $inlineScripts->length : 0,
            'preconnect' => $preconnect ? $preconnect->length : 0,
            'preload' => $preload ? $preload->length : 0,
        ];
    }

    private function getSemanticSignals(?DOMDocument $document): array
    {
        $xpath = $this->xpath($document);
        if (!$xpath) {
            return [];
        }

        $tags = ['main', 'header', 'nav', 'footer', 'article', 'section'];
        $signals = [];

        foreach ($tags as $tag) {
            $nodes = $xpath->query('//'.$tag);
            $signals[$tag] = ($nodes ? $nodes->length : 0) > 0;
        }

        return $signals;
    }

    private function normalizeText(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = preg_replace('/\s+/u', ' ', trim($value));

        return $value === '' ? null : $value;
    }
}
