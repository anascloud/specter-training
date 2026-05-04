<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function landingPage()
    {
        return view('frontend.pages.home', ['title' => 'Specter Training Center']);
    }

    public function aboutPage()
    {
        return view('frontend.pages.about', ['title' => 'About Us']);
    }

    public function qualificationsPage()
    {
        return view('frontend.pages.qualifications', ['title' => 'Qualifications']);
    }
}
