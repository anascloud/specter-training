<?php

use App\SEO\Models\SeoMeta;

if (!function_exists('seo')) {

    function seo(?string $path = null): ?SeoMeta
    {
        $path = $path ?? request()->route()?->getName();

        return SeoMeta::query()
            ->where('path', $path)
            ->where('is_active', true)
            ->first();
    }
}