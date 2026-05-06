<?php

namespace App\Traits;

use Illuminate\Routing\Route as IlluminateRoute;
use Illuminate\Support\Facades\Route;
use ReflectionMethod;
use Throwable;

trait RouteDiscoveryTrait
{
    /**
     * Routes to exclude from the SEO dropdown.
     */
    private const EXCLUDED_ROUTES = [
        'courses.apply',
        'download.brochure',
        'sanctum.*',
        'ignition.*',
        'courses.show',
    ];

    /**
     * Target route file path.
     */
    private const TARGET_ROUTE_FILE = 'routes/user/web.php';

    /**
     * Get all named GET routes from the target route file.
     */
    public function getSpecificRouteList(): array
    {
        $routes = [];

        foreach (Route::getRoutes() as $route) {
            if (!$this->isValidRoute($route)) {
                continue;
            }

            $name = $route->getName();

            if ($this->isRouteFromTargetFile($route)) {
                $routes[$name] = $this->formatRouteName($name);
            }
        }

        return $routes;
    }

    /**
     * Check if the route is valid for listing.
     */
    private function isValidRoute(IlluminateRoute $route): bool
    {
        $name = $route->getName();

        return $name
            && in_array('GET', $route->methods())
            && !$this->shouldSkipRoute($name);
    }

    /**
     * Determine if the route should be skipped.
     */
    private function shouldSkipRoute(string $routeName): bool
    {
        foreach (self::EXCLUDED_ROUTES as $excludedRoute) {
            if (fnmatch($excludedRoute, $routeName)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if route belongs to the target route file.
     */
    private function isRouteFromTargetFile(IlluminateRoute $route): bool
    {
        $action = $route->getAction();

        if (!isset($action['controller'])) {
            return false;
        }

        try {
            [$controller, $method] = explode('@', $action['controller']);

            $reflection = new ReflectionMethod($controller, $method);

            $filePath = str_replace('\\', '/', $reflection->getFileName());

            return str_contains($filePath, self::TARGET_ROUTE_FILE);

        } catch (Throwable $e) {
            return false;
        }
    }

    /**
     * Format route name for display.
     *
     * Example:
     * courses.index => Courses Index
     */
    private function formatRouteName(string $routeName): string
    {
        return ucwords(
            str_replace(['-', '.', '_'], ' ', $routeName)
        );
    }
}