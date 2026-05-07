<?php

namespace App\SEO\Audit;

class SeoAuditCsvExporter
{
    public function export(array $report): string
    {
        $rows = [];

        $rows[] = [
            'uri',
            'status',
            'seo_score',
            'performance_score',
            'accessibility_score',
            'mobile_seo_score',
            'structured_data_score',
            'severity',
            'top_issue_codes',
            'title',
            'meta_description',
            'canonical',
            'h1_count',
            'missing_image_alt',
            'dom_elements',
            'server_processing_ms',
        ];

        $pages = $report['pages'] ?? [];
        if (!is_array($pages)) {
            $pages = [];
        }

        foreach ($pages as $page) {
            $analysis = is_array($page['analysis'] ?? null) ? $page['analysis'] : [];

            $scores = is_array($page['scores'] ?? null) ? $page['scores'] : [];
            $issues = is_array($page['issues'] ?? null) ? $page['issues'] : [];
            $issueCodes = array_values(array_filter(array_map(fn ($i) => $i['code'] ?? null, array_slice($issues, 0, 5))));

            $meta = is_array($analysis['meta'] ?? null) ? $analysis['meta'] : [];
            $headings = is_array($analysis['headings'] ?? null) ? $analysis['headings'] : [];
            $images = is_array($analysis['images'] ?? null) ? $analysis['images'] : [];

            $h1Count = is_array($headings['h1'] ?? null) ? count($headings['h1']) : 0;
            $missingAlt = (int) ($images['missing_alt'] ?? 0);

            $rows[] = [
                $page['uri'] ?? '',
                $page['status'] ?? '',
                $scores['seo'] ?? '',
                $scores['performance'] ?? '',
                $scores['accessibility'] ?? '',
                $scores['mobile_seo'] ?? '',
                $scores['structured_data'] ?? '',
                $page['severity'] ?? '',
                implode('|', $issueCodes),
                $meta['title'] ?? '',
                $meta['description'] ?? '',
                $meta['canonical'] ?? '',
                $h1Count,
                $missingAlt,
                $analysis['performance_signals']['dom_elements'] ?? '',
                $analysis['server_processing_ms'] ?? '',
            ];
        }

        $stream = fopen('php://temp', 'wb+');
        foreach ($rows as $row) {
            fputcsv($stream, $row);
        }
        rewind($stream);

        $csv = stream_get_contents($stream);
        fclose($stream);

        return is_string($csv) ? $csv : '';
    }
}

