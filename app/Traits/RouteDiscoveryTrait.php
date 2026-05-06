<?php

namespace App\Traits;

use Illuminate\Support\Facades\Route;

trait RouteDiscoveryTrait
{
    /**
     * Routes to exclude.
     */
    private array $excludedRoutes = [
        'courses.apply',
        'download.brochure',
        'sanctum.*',
        'ignition.*',
        'qualifications.details',
        'admin.login',
        'admin.*',
        'password.*',
        'storage.local*',
    ];

    /**
     * Get all available routes including dynamic routes.
     */
    public function getRouteList(): array
    {
        $routes = [];

        /*
        |--------------------------------------------------------------------------
        | Static Laravel Routes
        |--------------------------------------------------------------------------
        */
        foreach (Route::getRoutes() as $route) {

            if (!$this->isValidRoute($route)) {
                continue;
            }

            $name = $route->getName();

            $routes[$name] = $this->formatRouteName($name);
        }

        /*
        |--------------------------------------------------------------------------
        | Dynamic Course Routes
        |--------------------------------------------------------------------------
        */
        if (method_exists($this, 'getCourses')) {

            foreach ($this->getCourses() as $course) {

                if (!isset($course['slug'], $course['title'])) {
                    continue;
                }

                $key = 'course:' . $course['slug'];

                $routes[$key] = 'Course: ' . $course['title'];
            }
        }

        return $routes;
    }

    /**
     * Check if route is valid.
     */
    private function isValidRoute($route): bool
    {
        $name = $route->getName();

        return $name
            && $this->isGetRoute($route)
            && !$this->shouldSkipRoute($name);
    }

    /**
     * Check GET method.
     */
    private function isGetRoute($route): bool
    {
        return in_array('GET', $route->methods());
    }

    /**
     * Determine whether route should be skipped.
     */
    private function shouldSkipRoute(string $routeName): bool
    {
        foreach ($this->excludedRoutes as $excludedRoute) {

            if (fnmatch($excludedRoute, $routeName)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Format route name for display.
     *
     * Example:
     * qualifications.details => Qualifications Details
     */
    private function formatRouteName(string $routeName): string
    {
        return ucwords(
            str_replace(
                ['-', '.', '_'],
                ' ',
                $routeName
            )
        );
    }
}