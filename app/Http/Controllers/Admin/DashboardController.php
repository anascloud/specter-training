<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SEO\Audit\SeoAuditReportRepository;

class DashboardController extends Controller
{
    public function index(SeoAuditReportRepository $reports)
    {
        $filename = $reports->bestReportFilename();
        $report = $filename ? $reports->loadReport($filename) : null;

        return view('backend.pages.dashboard.index', [
            'title' => 'Admin Dashboard',
            'seoAuditReport' => $report,
            'seoAuditReportFile' => $filename,
        ]);
    }
}
