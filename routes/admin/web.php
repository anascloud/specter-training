<?php

use App\Http\Controllers\Admin\Auth\AuthController;
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
    });

    Route::middleware('guest')->group(function () {
        Route::get('/signin', [AuthController::class, 'show'])->name('signin');
        Route::post('/signin', [AuthController::class, 'authenticate'])->name('signin.submit');
    });
});
