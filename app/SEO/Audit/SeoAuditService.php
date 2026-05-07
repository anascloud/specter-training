<?php

namespace App\SEO\Audit;

use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class SeoAuditService
{
    use CourseTrait;
    use RouteDiscoveryTrait;

    public function __construct(
        private readonly HtmlPageAnalyzer $analyzer,
        private readonly SeoScorer $scorer,
        private readonly Kernel $kernel,
    ) {
    }

    public function run(?int $limit = null, ?string $onlyUriContains = null): array
    {
        $routes = $this->getRouteList();

        $routeItems = [];
        foreach ($routes as $uri => $label) {
            $normalized = $this->normalizeUri($uri);
            if ($normalized === null) {
                continue;
            }

            if ($onlyUriContains !== null && !str_contains($normalized, $onlyUriContains)) {
                continue;
            }

            $routeItems[] = ['uri' => $normalized, 'label' => $label];
        }

        usort($routeItems, fn ($a, $b) => strcmp($a['uri'], $b['uri']));
        if ($limit !== null) {
            $routeItems = array_slice($routeItems, 0, max(0, $limit));
        }

        $knownUris = array_values(array_unique(array_map(fn ($i) => $i['uri'], $routeItems)));

        $pages = [];
        foreach ($routeItems as $route) {
            $pages[] = $this->auditOne($route['uri'], $route['label'], $knownUris);
        }

        $duplicateContext = $this->buildDuplicateContext($pages);

        $scoredPages = [];
        foreach ($pages as $page) {
            $scored = $this->scorer->score($page['analysis'], $duplicateContext);
            $scoredPages[] = [
                'uri' => $page['uri'],
                'label' => $page['label'],
                'status' => $page['analysis']['status'] ?? null,
                'scores' => $scored['scores'],
                'severity' => $this->overallSeverity($scored['issues']),
                'issues' => $scored['issues'],
                'analysis' => $this->enrichAnalysis($page['analysis'], $knownUris),
            ];
        }

        return [
            'generated_at' => now()->toIso8601String(),
            'app_url' => config('app.url'),
            'page_count' => count($scoredPages),
            'duplicates' => [
                'titles' => $this->topDuplicates($duplicateContext['titles']),
                'meta_descriptions' => $this->topDuplicates($duplicateContext['descriptions']),
            ],
            'pages' => $scoredPages,
            'summary' => $this->summary($scoredPages),
        ];
    }

    public function writeReport(array $report, ?string $relativePath = null): string
    {
        $relativePath ??= 'seo-audits/seo-audit-'.now()->format('Ymd-His').'.json';

        Storage::disk('local')->put($relativePath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return Storage::disk('local')->path($relativePath);
    }

    private function auditOne(string $uri, string $label, array $knownUris): array
    {
        $request = Request::create($uri, 'GET');
        $start = microtime(true);

        try {
            $response = $this->kernel->handle($request);
            $serverMs = (microtime(true) - $start) * 1000;
            $this->kernel->terminate($request, $response);

            $status = $response->getStatusCode();
            $headers = $response->headers->all();
            $html = (string) $response->getContent();
        } catch (Throwable $e) {
            $serverMs = (microtime(true) - $start) * 1000;

            $status = 500;
            $headers = [];
            $html = '';
        }

        $analysis = $this->analyzer->analyze($uri, $status, $headers, $html, $serverMs);

        return [
            'uri' => $uri,
            'label' => $label,
            'analysis' => $analysis,
        ];
    }

    private function normalizeUri(string $uri): ?string
    {
        $uri = trim($uri);
        if ($uri === '') {
            return '/';
        }

        if (str_starts_with($uri, 'http://') || str_starts_with($uri, 'https://')) {
            $path = parse_url($uri, PHP_URL_PATH);
            return is_string($path) && $path !== '' ? $path : '/';
        }

        if (!str_starts_with($uri, '/')) {
            $uri = '/'.$uri;
        }

        return $uri;
    }

    private function buildDuplicateContext(array $pages): array
    {
        $titles = [];
        $descriptions = [];

        foreach ($pages as $page) {
            $title = $page['analysis']['meta']['title'] ?? null;
            $desc = $page['analysis']['meta']['description'] ?? null;

            if ($title) {
                $titles[$title] = ($titles[$title] ?? 0) + 1;
            }
            if ($desc) {
                $descriptions[$desc] = ($descriptions[$desc] ?? 0) + 1;
            }
        }

        return [
            'titles' => $titles,
            'descriptions' => $descriptions,
        ];
    }

    private function topDuplicates(array $counts, int $limit = 20): array
    {
        arsort($counts);

        $items = [];
        foreach ($counts as $value => $count) {
            if ($count <= 1) {
                continue;
            }
            $items[] = ['value' => $value, 'count' => $count];
            if (count($items) >= $limit) {
                break;
            }
        }

        return $items;
    }

    private function overallSeverity(array $issues): string
    {
        foreach (['Critical', 'High', 'Medium', 'Low'] as $severity) {
            foreach ($issues as $issue) {
                if (($issue['severity'] ?? null) === $severity) {
                    return $severity;
                }
            }
        }

        return 'Low';
    }

    private function enrichAnalysis(array $analysis, array $knownUris): array
    {
        $links = $analysis['links']['items'] ?? [];
        $internalBroken = [];
        $genericAnchors = 0;
        $mixedContent = 0;

        $appUrl = (string) config('app.url');
        $isHttps = str_starts_with($appUrl, 'https://');

        $knownPaths = [];
        foreach ($knownUris as $knownUri) {
            $normalized = $this->normalizeLinkPath($knownUri);
            if ($normalized !== null) {
                $knownPaths[] = $normalized;
            }
        }
        $knownSet = array_fill_keys(array_values(array_unique($knownPaths)), true);

        foreach ($links as $link) {
            $href = $link['href'] ?? '';
            if (!is_string($href) || $href === '') {
                continue;
            }

            $text = strtolower(trim((string) ($link['text'] ?? '')));
            if (in_array($text, ['click here', 'learn more', 'read more', 'more', 'here'], true)) {
                $genericAnchors++;
            }

            if ($isHttps && str_starts_with($href, 'http://')) {
                $mixedContent++;
            }

            $path = $this->normalizeLinkPath($href);
            if ($path === null) {
                continue;
            }

            if (!isset($knownSet[$path])) {
                $internalBroken[] = $href;
            }
        }

        $internalBroken = array_values(array_unique(array_slice($internalBroken, 0, 50)));

        $analysis['link_quality'] = [
            'generic_anchor_count' => $genericAnchors,
            'broken_internal_links' => $internalBroken,
        ];

        $analysis['mixed_content'] = [
            'mixed_content_url_count' => $mixedContent,
        ];

        return $analysis;
    }

    private function normalizeLinkPath(string $href): ?string
    {
        $href = trim($href);
        if ($href === '' || $href === '#' || str_starts_with($href, 'mailto:') || str_starts_with($href, 'tel:') || str_starts_with($href, 'javascript:')) {
            return null;
        }

        if (str_starts_with($href, 'http://') || str_starts_with($href, 'https://')) {
            $path = parse_url($href, PHP_URL_PATH);
            return is_string($path) && $path !== '' ? $path : '/';
        }

        $href = explode('#', $href, 2)[0];
        $href = explode('?', $href, 2)[0];

        if ($href === '') {
            return null;
        }

        if (!str_starts_with($href, '/')) {
            $href = '/'.$href;
        }

        return $href === '' ? '/' : $href;
    }

    private function summary(array $pages): array
    {
        $counts = [
            'Critical' => 0,
            'High' => 0,
            'Medium' => 0,
            'Low' => 0,
        ];

        $scoreTotals = [
            'seo' => 0,
            'performance' => 0,
            'accessibility' => 0,
            'mobile_seo' => 0,
            'structured_data' => 0,
        ];

        foreach ($pages as $page) {
            $counts[$page['severity']] = ($counts[$page['severity']] ?? 0) + 1;
            foreach ($scoreTotals as $k => $v) {
                $scoreTotals[$k] += (int) ($page['scores'][$k] ?? 0);
            }
        }

        $pageCount = max(1, count($pages));
        $averages = [];
        foreach ($scoreTotals as $k => $v) {
            $averages[$k] = (int) round($v / $pageCount);
        }

        return [
            'severity_breakdown' => $counts,
            'average_scores' => $averages,
        ];
    }
}
