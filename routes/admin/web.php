<?php

use App\Http\Controllers\Admin\AuthController;
use App\SEO\Controllers\SeoController;
use App\SEO\Audit\SeoAuditCsvExporter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:super admin'])->group(function () {

    Route::get('/dashboard', function () {
        $disk = Storage::disk('local');
        $files = $disk->files('seo-audits');
        $latest = null;

        if (!empty($files)) {
            $latest = collect($files)
                ->sortByDesc(fn ($f) => $disk->lastModified($f))
                ->first();
        }

        $seoAuditReport = null;
        $seoAuditReportFile = null;

        if (is_string($latest) && $disk->exists($latest)) {
            $decoded = json_decode($disk->get($latest), true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $seoAuditReport = $decoded;
                $seoAuditReportFile = basename($latest);
            }
        }

        return view('backend.pages.dashboard.index', [
            'title' => 'Admin Dashboard',
            'seoAuditReport' => $seoAuditReport,
            'seoAuditReportFile' => $seoAuditReportFile,
        ]);
    })->name('dashboard');

    Route::get('/seo-audit/download/{filename}', function (string $filename) {
        $filename = basename($filename);
        $path = 'seo-audits/'.$filename;

        $disk = Storage::disk('local');
        abort_unless($disk->exists($path), 404);

        return response()->download($disk->path($path), $filename, [
            'Content-Type' => 'application/json; charset=utf-8',
        ]);
    })->name('seo-audit.download');

    Route::get('/seo-audit/download-csv/{filename}', function (string $filename) {
        $filename = basename($filename);
        $path = 'seo-audits/'.$filename;

        $disk = Storage::disk('local');
        abort_unless($disk->exists($path), 404);

        $decoded = json_decode($disk->get($path), true);
        abort_unless(json_last_error() === JSON_ERROR_NONE && is_array($decoded), 422);

        $exporter = app(SeoAuditCsvExporter::class);
        $csv = $exporter->export($decoded);

        $downloadName = preg_replace('/\.json$/i', '', $filename).'.csv';

        return response($csv, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="'.$downloadName.'"',
        ]);
    })->name('seo-audit.download-csv');

    Route::resource('seo', SeoController::class);

});
