<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
  public function courseDetails($slug)
{
    $path = public_path('/courses.json');

    if (!file_exists($path)) {
        abort(500, 'Courses file missing');
    }

    $json = file_get_contents($path);
    $data = json_decode($json, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        abort(500, json_last_error_msg());
    }

    $courses = collect($data['courses']);

    $course = $courses->firstWhere('slug', $slug);

    if (!$course) {
        abort(404);
    }

    $view = 'frontend.pages.courses.' . $slug;

    if (!view()->exists($view)) {
        abort(404, 'Course page not found');
    }

    return view($view, [
        'course' => $course,
        'title' => $course['title']
    ]);
}

    //  private function getCourses()
    // {
    //     $path = public_path('/courses.json');

    //     if (!file_exists($path)) {
    //         return collect();
    //     }

    //     return collect(json_decode(file_get_contents($path), true)['courses']);
    // }
}
