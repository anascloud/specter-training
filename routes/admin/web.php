<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard.index', [
            'title' => 'Admin Dashboard'
        ]);
    })->name('dashboard');

});

// authentication pages
Route::get('/signin', function () {
    return view('backend.pages.auth.signin', ['title' => 'Sign In']);
})->name('signin');
