<?php

use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'landingPage'])->name('landing-page');
Route::get('/about', [FrontendController::class, 'aboutPage'])->name('about-page');
Route::get('/qualifications', [FrontendController::class, 'qualificationsPage'])->name('qualifications-page');
Route::get('/contact', [FrontendController::class, 'contactPage'])->name('contact-page');


Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');
Route::post('/apply', [CourseController::class, 'apply'])->name('courses.apply');