<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'landingPage'])->name('landing-page');
Route::get('/about', [FrontendController::class, 'aboutPage'])->name('about-page');
Route::get('/qualifications', [FrontendController::class, 'qualificationsPage'])->name('qualifications-page');