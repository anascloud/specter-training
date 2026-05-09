<?php

namespace App\Providers;

use App\Repositories\SectionRepository;
use App\Repositories\SectionRepositoryInterface;
use App\Services\SectionService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        // Service bind
        $this->app->singleton('section-service', function ($app) {
            return new SectionService(
                $app->make(SectionRepositoryInterface::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);
    }
}
