<?php

use Illuminate\Support\Facades\Route;

// dashboard pages
Route::get('/', function () {
    return view('frontend.pages.home', ['title' => 'Specter Training Center']);
})->name('landing');