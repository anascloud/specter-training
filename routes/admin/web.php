<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Frontend\PageController;
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

    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard.index', [
            'title' => 'Admin Dashboard'
        ]);
    })->name('dashboard');
    Route::resource('seo', SeoController::class);
    Route::resource('pages', AdminPageController::class);
    Route::get('pages/{page}/builder', [AdminPageController::class, 'builder'])->name('pages.builder');
    Route::post('pages/{page}/sections', [AdminPageController::class, 'storeSection'])->name('pages.sections.store');
    Route::post('sections/{section}/blocks', [AdminPageController::class, 'storeBlock'])->name('sections.blocks.store');

    Route::get('/', [PageController::class, 'home']);

});
