<?php

namespace App\Services\Cms;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;

class HtmlSanitizer
{
    private const ALLOWED_TAGS = [
        'a', 'b', 'blockquote', 'br', 'code', 'div', 'em', 'figure', 'figcaption', 'h1', 'h2', 'h3', 'h4', 'h5',
        'h6', 'hr', 'i', 'img', 'li', 'ol', 'p', 'pre', 'span', 'strong', 'table', 'tbody', 'td', 'th', 'thead',
        'tr', 'u', 'ul',
    ];

    private const ALLOWED_ATTRS = [
        'alt', 'class', 'height', 'href', 'id', 'rel', 'src', 'target', 'title', 'width',
    ];

    public function sanitize(?string $html): string
    {
        $html = (string) $html;

        if (trim($html) === '') {
            return '';
        }

        $dom = new DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true);
        $dom->loadHTML(
            '<!doctype html><html><body>' . $html . '</body></html>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);

        foreach ($xpath->query('//script|//style|//iframe|//object|//embed') as $node) {
            $node?->parentNode?->removeChild($node);
        }

        foreach ($xpath->query('//*') as $node) {
            if (!($node instanceof DOMElement)) {
                continue;
            }

            $tag = strtolower($node->tagName);

            if (!in_array($tag, self::ALLOWED_TAGS, true)) {
                $this->unwrapNode($node);
                continue;
            }

            $this->sanitizeAttributes($node);
        }

        $body = $dom->getElementsByTagName('body')->item(0);
        $output = '';

        if ($body instanceof DOMElement) {
            foreach ($body->childNodes as $child) {
                $output .= $dom->saveHTML($child);
            }
        }

        return $output;
    }

    private function sanitizeAttributes(DOMElement $element): void
    {
        if (!$element->hasAttributes()) {
            return;
        }

        $remove = [];

        foreach ($element->attributes as $attr) {
            $name = strtolower($attr->name);
            $value = $attr->value;

            if (str_starts_with($name, 'on')) {
                $remove[] = $attr->name;
                continue;
            }

            if (!in_array($name, self::ALLOWED_ATTRS, true)) {
                $remove[] = $attr->name;
                continue;
            }

            if ($name === 'href' || $name === 'src') {
                if (!$this->isSafeUrl($value)) {
                    $remove[] = $attr->name;
                    continue;
                }
            }
        }

        foreach ($remove as $attrName) {
            $element->removeAttribute($attrName);
        }

        if (strtolower($element->tagName) === 'a') {
            $target = strtolower((string) $element->getAttribute('target'));
            if ($target === '_blank') {
                $rel = trim((string) $element->getAttribute('rel'));
                $needed = ['noopener', 'noreferrer'];
                $current = $rel === '' ? [] : (preg_split('/\s+/', $rel) ?: []);
                $merged = array_values(array_unique(array_merge($current, $needed)));
                $element->setAttribute('rel', implode(' ', $merged));
            }
        }

        if (strtolower($element->tagName) === 'img') {
            if (!$element->hasAttribute('loading')) {
                $element->setAttribute('loading', 'lazy');
            }
        }
    }

    private function isSafeUrl(string $url): bool
    {
        $url = trim($url);

        if ($url === '' || str_starts_with($url, '#') || str_starts_with($url, '/')) {
            return true;
        }

        $lower = strtolower($url);

        if (str_starts_with($lower, 'javascript:') || str_starts_with($lower, 'data:')) {
            return false;
        }

        return str_starts_with($lower, 'http://')
            || str_starts_with($lower, 'https://')
            || str_starts_with($lower, 'mailto:')
            || str_starts_with($lower, 'tel:');
    }

    private function unwrapNode(DOMElement $node): void
    {
        $parent = $node->parentNode;
        if (!$parent instanceof DOMNode) {
            return;
        }

        while ($node->firstChild) {
            $parent->insertBefore($node->firstChild, $node);
        }

        $parent->removeChild($node);
    }
}
