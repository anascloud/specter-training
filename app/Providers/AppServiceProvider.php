<?php

namespace App\Providers;

use App\Repositories\Admin\Auth\AdminAuthRepository;
use App\Repositories\Admin\Auth\AdminAuthRepositoryInterface;
use App\Repositories\Cms\EloquentPageRepository;
use App\Repositories\Cms\EloquentSectionRepository;
use App\Repositories\Cms\PageRepositoryInterface;
use App\Repositories\Cms\SectionRepositoryInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminAuthRepositoryInterface::class, AdminAuthRepository::class);
        $this->app->bind(PageRepositoryInterface::class, EloquentPageRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, EloquentSectionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
