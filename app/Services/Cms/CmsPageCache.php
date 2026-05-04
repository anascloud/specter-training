<?php

namespace App\Services\Cms;

use Illuminate\Support\Facades\Cache;

class CmsPageCache
{
    public function rememberPageHtml(string $slug, int $ttlSeconds, callable $callback): string
    {
        return Cache::remember($this->htmlKey($slug), $ttlSeconds, $callback);
    }

    public function forgetPage(string $slug): void
    {
        Cache::forget($this->htmlKey($slug));
    }

    private function htmlKey(string $slug): string
    {
        return 'cms_page_html:' . $slug;
    }
}

