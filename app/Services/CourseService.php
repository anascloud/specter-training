<?php

namespace App\Services;

use Illuminate\Support\Collection;

class CourseService
{
    /**
     * Fetch all courses from the JSON file.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCourses(): Collection
    {
        $path = public_path('/courses.json');

        if (!file_exists($path)) {
            return collect();
        }

        $data = json_decode(file_get_contents($path), true);
        
        return collect($data['courses'] ?? []);
    }
}