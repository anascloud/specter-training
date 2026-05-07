<?php

namespace App\SEO\Controllers;

use App\Http\Controllers\Controller;
use App\SEO\Audit\SeoAuditCsvExporter;
use App\SEO\Audit\SeoAuditReportRepository;
use Illuminate\Http\Request;

class SeoAuditController extends Controller
{
    public function index(SeoAuditReportRepository $reports)
    {
        return redirect()->route('admin.dashboard');
    }

    public function show(string $filename, Request $request, SeoAuditReportRepository $reports)
    {
        $report = $reports->loadReport($filename);
        abort_unless(is_array($report), 404);

        $pages = $report['pages'] ?? [];
        $pages = is_array($pages) ? $pages : [];

        $uriContains = $request->string('uri_contains')->toString();
        $severity = $request->string('severity')->toString();

        if ($uriContains !== '') {
            $pages = array_values(array_filter($pages, fn ($p) => str_contains((string) ($p['uri'] ?? ''), $uriContains)));
        }

        if ($severity !== '') {
            $pages = array_values(array_filter($pages, fn ($p) => (string) ($p['severity'] ?? '') === $severity));
        }

        $report['pages'] = $pages;

        return response()->json($report, 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function downloadJson(string $filename, SeoAuditReportRepository $reports)
    {
        $download = $reports->downloadPath($filename);
        abort_unless(is_array($download), 404);

        return response()->download($download['absolute_path'], $download['filename'], [
            'Content-Type' => 'application/json; charset=utf-8',
        ]);
    }

    public function downloadCsv(string $filename, SeoAuditReportRepository $reports, SeoAuditCsvExporter $exporter)
    {
        $report = $reports->loadReport($filename);
        abort_unless(is_array($report), 404);

        $csv = $exporter->export($report);
        $downloadName = preg_replace('/\.json$/i', '', basename($filename)).'.csv';

        return response($csv, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="'.$downloadName.'"',
        ]);
    }
}
