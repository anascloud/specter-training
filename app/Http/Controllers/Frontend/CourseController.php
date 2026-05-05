<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\CourseService; 

class CourseController extends Controller
{
    protected $courseService;

    /**
     * Inject the CourseService.
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function courseDetails($slug)
    {
        // Fetch all courses using the global service
        $courses = $this->courseService->getCourses();

        // Find the specific course by slug
        $course = $courses->firstWhere('slug', $slug);

        // If course doesn't exist in JSON, 404
        if (!$course) {
            abort(404);
        }

        // Define the specific view path
        $view = 'frontend.pages.courses.' . $slug;

        // Ensure the Blade file actually exists before rendering
        if (!view()->exists($view)) {
            abort(404, 'Course page template not found');
        }

        return view($view, [
            'course' => $course,
            'title' => $course['title']
        ]);
    }
}