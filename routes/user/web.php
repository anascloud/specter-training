<?php

use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'landingPage'])->name('landing-page');
Route::get('/about', [FrontendController::class, 'aboutPage'])->name('about-page');
Route::get('/qualifications', [FrontendController::class, 'qualificationsPage'])->name('qualifications-page');
Route::get('/contact', [FrontendController::class, 'contactPage'])->name('contact-page');



Route::get('/qualifications/{slug}', [CourseController::class, 'courseDetails'])
    ->name('courses.show');
Route::post('/apply', [CourseController::class, 'apply'])->name('courses.apply');


// legal page
Route::get('/legal/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('legal.privacy-policy');
Route::get('/legal/terms-of-service', [FrontendController::class, 'termsOfService'])->name('legal.terms-of-service');
Route::get('/legal/accreditations', [FrontendController::class, 'accreditations'])->name('legal.accreditations');
Route::get('/legal/cookie-policy', [FrontendController::class, 'cookiePolicy'])->name('legal.cookie-policy');

Route::get('/download-brochure', function () {
    return response()->download(
        public_path('brochure.pdf'),
        'brochure.pdf'
    );
})->name('download.brochure');