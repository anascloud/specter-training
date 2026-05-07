<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\SEO\Controllers\SeoAuditController;
use App\SEO\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:super admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/seo-audits', [SeoAuditController::class, 'index'])->name('seo-audits.index');
    Route::get('/seo-audits/{filename}', [SeoAuditController::class, 'show'])->name('seo-audits.show');
    Route::get('/seo-audits/{filename}/download.json', [SeoAuditController::class, 'downloadJson'])->name('seo-audits.download-json');
    Route::get('/seo-audits/{filename}/download.csv', [SeoAuditController::class, 'downloadCsv'])->name('seo-audits.download-csv');

    Route::resource('seo', SeoController::class);

});
