<?php

namespace App\SEO\Console;

use App\SEO\Audit\SeoAuditService;

class SeoAuditCli
{
    public function run(object $command): int
    {
        $limit = $command->option('limit');
        $limit = is_numeric($limit) ? (int) $limit : null;

        $only = $command->option('only');
        $only = is_string($only) && $only !== '' ? $only : null;

        $auditor = app(SeoAuditService::class);
        $report = $auditor->run($limit, $only);
        $path = $auditor->writeReport($report);

        $avg = $report['summary']['average_scores'] ?? [];
        $sev = $report['summary']['severity_breakdown'] ?? [];

        $command->info('SEO audit report generated');
        $command->line('Report: '.$path);
        $command->line('Pages: '.($report['page_count'] ?? 0));
        $command->line('Avg Scores - SEO: '.($avg['seo'] ?? '-').', Perf: '.($avg['performance'] ?? '-').', A11y: '.($avg['accessibility'] ?? '-').', Mobile: '.($avg['mobile_seo'] ?? '-').', Schema: '.($avg['structured_data'] ?? '-'));
        $command->line('Severity - Critical: '.($sev['Critical'] ?? 0).', High: '.($sev['High'] ?? 0).', Medium: '.($sev['Medium'] ?? 0).', Low: '.($sev['Low'] ?? 0));

        return 0;
    }
}

