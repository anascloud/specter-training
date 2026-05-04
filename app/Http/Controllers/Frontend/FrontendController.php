<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function landingPage()
    {
        $courses = $this->getCourses()->take(3);
        return view('frontend.pages.home', ['title' => 'Specter Training Center', 'courses' => $courses]);
    }

    public function aboutPage()
    {
        return view('frontend.pages.about', ['title' => 'About Us']);
    }
    public function contactPage()
    {
        return view('frontend.pages.contact', ['title' => 'Contact Us']);
    }

    public function qualificationsPage(Request $request)
    {
        $allCourses = collect($this->getCourses());
        $courses = $allCourses;

        // Industry filter
        if ($request->filled('industry')) {
            $industry = strtolower($request->industry);

            $courses = $courses->filter(function ($course) use ($industry) {
                return strtolower($course['industry']) === $industry;
            });
        }

        // Level filter
        if ($request->filled('level')) {
            $level = strtolower($request->level);

            $courses = $courses->filter(function ($course) use ($level) {
                return strtolower($course['level']) === $level;
            });
        }

        // Search
        if ($request->filled('search')) {

            $search = strtolower(trim($request->search));

            $courses = $courses->filter(function ($course) use ($search) {

                return str_contains(strtolower($course['title']), $search) ||
                    str_contains(strtolower($course['code']), $search) ||
                    str_contains(strtolower($course['industry']), $search) ||
                    str_contains(strtolower($course['level']), $search) ||
                    str_contains(strtolower($course['description']), $search);
            });
        }

        $courses = $courses->values();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.pages.partials.qualification-cards', [
                    'courses' => $courses,
                ])->render(),
                'count' => $courses->count(),
            ]);
        }

        return view('frontend.pages.qualifications', [
            'title' => 'Qualifications',
            'courses' => $courses,
            'industries' => $allCourses->pluck('industry')->unique()->sort()->values(),
            'levels' => $allCourses->pluck('level')->unique()->sort()->values(),
        ]);
    }


    private function getCourses()
    {
        $path = public_path('/courses.json');

        if (!file_exists($path)) {
            return collect();
        }

        return collect(json_decode(file_get_contents($path), true)['courses']);
    }
}
