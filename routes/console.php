<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('seo:audit {--limit= : Max number of pages to audit} {--only= : Only audit URIs containing this string}', function () {
    return app(\App\SEO\Console\SeoAuditCli::class)->run($this);
})->purpose('Enterprise SEO + performance heuristic audit for all public routes (RouteDiscoveryTrait)');
