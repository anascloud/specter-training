<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('seo:audit {--limit= : Max number of pages to audit} {--only= : Only audit URIs containing this string}', function () {
    $limit = $this->option('limit');
    $limit = is_numeric($limit) ? (int) $limit : null;

    $only = $this->option('only');
    $only = is_string($only) && $only !== '' ? $only : null;

    $auditor = app(\App\SEO\Audit\SeoAuditService::class);

    $report = $auditor->run($limit, $only);
    $path = $auditor->writeReport($report);

    $avg = $report['summary']['average_scores'] ?? [];
    $sev = $report['summary']['severity_breakdown'] ?? [];

    $this->info('SEO audit report generated');
    $this->line('Report: '.$path);
    $this->line('Pages: '.($report['page_count'] ?? 0));
    $this->line('Avg Scores - SEO: '.($avg['seo'] ?? '-').', Perf: '.($avg['performance'] ?? '-').', A11y: '.($avg['accessibility'] ?? '-').', Mobile: '.($avg['mobile_seo'] ?? '-').', Schema: '.($avg['structured_data'] ?? '-'));
    $this->line('Severity - Critical: '.($sev['Critical'] ?? 0).', High: '.($sev['High'] ?? 0).', Medium: '.($sev['Medium'] ?? 0).', Low: '.($sev['Low'] ?? 0));
})->purpose('Enterprise SEO + performance heuristic audit for all public routes (RouteDiscoveryTrait)');
