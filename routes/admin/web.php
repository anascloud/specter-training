<?php

use App\SEO\Controllers\SeoController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard.index', [
            'title' => 'Admin Dashboard'
        ]);
    })->name('dashboard');
    Route::resource('seo', SeoController::class);

});

Route::get('/admin/login', function () {
    return view('backend.pages.auth.signin', [
        'title' => 'Admin Login'
    ]);
})->name('admin.login');
