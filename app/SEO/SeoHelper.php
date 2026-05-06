
<?php

use App\SEO\Models\SeoMeta;

class SeoHelper
{
    public static function get()
    {
        $path = request()->route()?->getName();
        $uri = request()->getRequestUri();

        return SeoMeta::query()
            ->where(function ($query) use ($path, $uri) {
                $query->where('path', $path)
                      ->orWhere('path', $uri);
            })
            ->where('is_active', true)
            ->first();
    }
}