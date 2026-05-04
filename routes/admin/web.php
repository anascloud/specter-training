<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Cms\MediaController;
use App\Http\Controllers\Admin\Cms\PageController;
use App\Http\Controllers\Admin\Cms\SectionController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/dashboard', '/admin/dashboard');
Route::redirect('/signin', '/admin/signin');
Route::get('/login', [AuthController::class, 'redirectToSignin'])->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::redirect('/', '/admin/dashboard');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('cms')->name('cms.')->group(function () {
            Route::resource('pages', PageController::class)->except(['show']);

            Route::get('pages/{page}/sections', [SectionController::class, 'index'])->name('pages.sections.index');
            Route::get('pages/{page}/sections/create', [SectionController::class, 'create'])->name('pages.sections.create');
            Route::post('pages/{page}/sections', [SectionController::class, 'store'])->name('pages.sections.store');
            Route::get('pages/{page}/sections/{section}/edit', [SectionController::class, 'edit'])->name('pages.sections.edit');
            Route::put('pages/{page}/sections/{section}', [SectionController::class, 'update'])->name('pages.sections.update');
            Route::delete('pages/{page}/sections/{section}', [SectionController::class, 'destroy'])->name('pages.sections.destroy');
            Route::post('pages/{page}/sections/reorder', [SectionController::class, 'reorder'])->name('pages.sections.reorder');

            Route::post('sections/preview', [SectionController::class, 'preview'])->name('sections.preview');
            Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');
        });
    });

    Route::get('/signin', [AuthController::class, 'show'])->name('signin');
    Route::post('/signin', [AuthController::class, 'authenticate'])->name('signin.submit');
});
