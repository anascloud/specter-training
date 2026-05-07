<?php

namespace App\SEO\Audit;

class SeoScorer
{
    public function score(array $page, array $duplicateContext): array
    {
        $issues = [];

        $title = $page['meta']['title'] ?? null;
        $description = $page['meta']['description'] ?? null;
        $canonical = $page['meta']['canonical'] ?? null;

        $h1Count = count($page['headings']['h1'] ?? []);
        $h2Count = count($page['headings']['h2'] ?? []);

        $titleLen = $title ? mb_strlen($title) : 0;
        $descLen = $description ? mb_strlen($description) : 0;

        if (($page['status'] ?? 0) >= 400) {
            $issues[] = $this->issue('Critical', 'http_error', 'Page returns an error status', 'Ensure the route returns 200 and is publicly reachable, or mark it noindex if intentionally private.');
        }

        if (!$title) {
            $issues[] = $this->issue('Critical', 'missing_title', 'Missing <title>', 'Set a unique, descriptive meta title per route (preferably from SeoMeta).');
        } elseif ($titleLen < 15) {
            $issues[] = $this->issue('High', 'short_title', 'Title is too short', 'Expand the title to describe the page intent (target 30–60 characters).');
        } elseif ($titleLen > 70) {
            $issues[] = $this->issue('Medium', 'long_title', 'Title is likely too long', 'Shorten the title to reduce truncation (target 30–60 characters).');
        }

        if (!$description) {
            $issues[] = $this->issue('High', 'missing_meta_description', 'Missing meta description', 'Write a compelling summary (target 70–160 characters) and keep it unique.');
        } elseif ($descLen < 50) {
            $issues[] = $this->issue('Medium', 'short_meta_description', 'Meta description is too short', 'Expand it to better summarize the page (target 70–160 characters).');
        } elseif ($descLen > 180) {
            $issues[] = $this->issue('Low', 'long_meta_description', 'Meta description is likely too long', 'Trim it to reduce truncation in SERPs (target 70–160 characters).');
        }

        if (!$canonical) {
            $issues[] = $this->issue('Medium', 'missing_canonical', 'Missing canonical URL', 'Add a canonical tag to reduce duplicate URL variants (filters, trailing slash, etc.).');
        }

        if ($h1Count === 0) {
            $issues[] = $this->issue('High', 'missing_h1', 'Missing H1', 'Add a single clear H1 describing the page topic.');
        } elseif ($h1Count > 1) {
            $issues[] = $this->issue('Medium', 'multiple_h1', 'Multiple H1 headings found', 'Keep a single primary H1 and move other headings to H2/H3.');
        }

        if ($h2Count === 0) {
            $issues[] = $this->issue('Low', 'missing_h2', 'No H2 headings found', 'Add H2 sections to improve scannability and topical structure.');
        }

        $schemaCount = (int) ($page['schema']['count'] ?? 0);
        $schemaValid = (int) ($page['schema']['valid_json'] ?? 0);
        if ($schemaCount === 0) {
            $issues[] = $this->issue('Medium', 'missing_schema', 'No JSON-LD schema detected', 'Add JSON-LD schema (Organization, WebSite, BreadcrumbList, Article/Course where relevant).');
        } elseif ($schemaValid < $schemaCount) {
            $issues[] = $this->issue('High', 'invalid_schema_json', 'Some JSON-LD blocks are not valid JSON', 'Fix invalid JSON and validate in Google Rich Results Test.');
        }

        $og = $page['meta']['open_graph'] ?? [];
        if (empty($og['og:title']) || empty($og['og:description']) || empty($og['og:url'])) {
            $issues[] = $this->issue('Low', 'missing_og_tags', 'OpenGraph tags are incomplete', 'Ensure og:title, og:description, og:url, og:type, og:image are present.');
        }

        $twitter = $page['meta']['twitter'] ?? [];
        if (empty($twitter['twitter:card']) || empty($twitter['twitter:title']) || empty($twitter['twitter:description'])) {
            $issues[] = $this->issue('Low', 'missing_twitter_tags', 'Twitter card tags are incomplete', 'Ensure twitter:card, twitter:title, twitter:description, twitter:image are present.');
        }

        $hreflang = $page['meta']['hreflang'] ?? [];
        if (count($hreflang) === 0) {
            $issues[] = $this->issue('Low', 'missing_hreflang', 'No hreflang detected', 'If the site is multilingual, implement hreflang with self-referencing + x-default.');
        }

        $imgCount = (int) ($page['images']['count'] ?? 0);
        $missingAlt = (int) ($page['images']['missing_alt'] ?? 0);
        if ($imgCount > 0 && $missingAlt > 0) {
            $issues[] = $this->issue($missingAlt > 5 ? 'High' : 'Medium', 'missing_image_alt', 'Some images are missing alt attributes', 'Add meaningful alt text for content images; use empty alt for purely decorative images.');
        }

        $domElements = (int) ($page['performance_signals']['dom_elements'] ?? 0);
        if ($domElements > 1500) {
            $issues[] = $this->issue('High', 'excessive_dom', 'DOM size is very large', 'Reduce nested wrappers, paginate long lists, and virtualize large tables to improve INP and memory use.');
        } elseif ($domElements > 900) {
            $issues[] = $this->issue('Medium', 'large_dom', 'DOM size is large', 'Simplify layout and reduce repeated components to improve responsiveness.');
        }

        $assets = $page['performance_signals']['assets'] ?? [];
        $stylesheets = (int) ($assets['stylesheets'] ?? 0);
        $scripts = (int) ($assets['scripts'] ?? 0);
        $preconnect = (int) ($assets['preconnect'] ?? 0);
        if ($stylesheets >= 3) {
            $issues[] = $this->issue('Medium', 'render_blocking_css_risk', 'Multiple stylesheets increase render-blocking risk', 'Bundle critical CSS, remove unused CSS, and consider preload for critical assets.');
        }
        if ($scripts >= 8) {
            $issues[] = $this->issue('Medium', 'heavy_js_risk', 'Many script tags increase INP risk', 'Defer non-critical scripts, split bundles, and remove unused JS.');
        }
        if ($preconnect === 0) {
            $issues[] = $this->issue('Low', 'missing_preconnect', 'No preconnect hints detected', 'For third-party origins (fonts/analytics), add preconnect to reduce connection setup cost.');
        }

        $seoScore = $this->clamp(100
            - $this->penalty($issues, [
                'Critical' => 18,
                'High' => 10,
                'Medium' => 6,
                'Low' => 3,
            ]));

        $performanceScore = $this->clamp(100
            - $this->penalty($issues, [
                'Critical' => 15,
                'High' => 12,
                'Medium' => 8,
                'Low' => 4,
            ], onlyCodes: [
                'excessive_dom',
                'large_dom',
                'render_blocking_css_risk',
                'heavy_js_risk',
                'missing_preconnect',
            ]));

        $accessibilityScore = $this->clamp(100
            - $this->penalty($issues, [
                'Critical' => 20,
                'High' => 12,
                'Medium' => 8,
                'Low' => 4,
            ], onlyCodes: [
                'missing_h1',
                'multiple_h1',
                'missing_image_alt',
            ]));

        $mobileSeoScore = $this->clamp(100
            - $this->penalty($issues, [
                'Critical' => 18,
                'High' => 10,
                'Medium' => 6,
                'Low' => 3,
            ], onlyCodes: [
                'long_title',
                'short_title',
                'long_meta_description',
                'short_meta_description',
            ]));

        $structuredDataScore = $this->clamp(100
            - $this->penalty($issues, [
                'Critical' => 25,
                'High' => 15,
                'Medium' => 10,
                'Low' => 5,
            ], onlyCodes: [
                'missing_schema',
                'invalid_schema_json',
            ]));

        if ($title && ($duplicateContext['titles'][$title] ?? 0) > 1) {
            $issues[] = $this->issue('High', 'duplicate_title', 'Title is duplicated across pages', 'Make titles unique per page intent and include a differentiator (course name, location, etc.).');
            $seoScore = $this->clamp($seoScore - 10);
            $mobileSeoScore = $this->clamp($mobileSeoScore - 8);
        }

        if ($description && ($duplicateContext['descriptions'][$description] ?? 0) > 1) {
            $issues[] = $this->issue('Medium', 'duplicate_meta_description', 'Meta description is duplicated across pages', 'Write unique summaries focused on each page’s value proposition.');
            $seoScore = $this->clamp($seoScore - 6);
        }

        return [
            'scores' => [
                'seo' => $seoScore,
                'performance' => $performanceScore,
                'accessibility' => $accessibilityScore,
                'mobile_seo' => $mobileSeoScore,
                'structured_data' => $structuredDataScore,
            ],
            'issues' => $this->sortIssues($issues),
        ];
    }

    private function issue(string $severity, string $code, string $message, string $recommendation): array
    {
        return [
            'severity' => $severity,
            'code' => $code,
            'message' => $message,
            'recommendation' => $recommendation,
        ];
    }

    private function penalty(array $issues, array $weights, ?array $onlyCodes = null): int
    {
        $penalty = 0;
        foreach ($issues as $issue) {
            if ($onlyCodes !== null && !in_array($issue['code'], $onlyCodes, true)) {
                continue;
            }

            $penalty += $weights[$issue['severity']] ?? 0;
        }

        return $penalty;
    }

    private function clamp(int $value): int
    {
        return max(0, min(100, $value));
    }

    private function sortIssues(array $issues): array
    {
        $order = ['Critical' => 0, 'High' => 1, 'Medium' => 2, 'Low' => 3];

        usort($issues, function ($a, $b) use ($order) {
            $sa = $order[$a['severity']] ?? 99;
            $sb = $order[$b['severity']] ?? 99;

            if ($sa === $sb) {
                return strcmp($a['code'], $b['code']);
            }

            return $sa <=> $sb;
        });

        return $issues;
    }
}
