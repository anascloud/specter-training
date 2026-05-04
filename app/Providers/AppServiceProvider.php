<?php

namespace App\Providers;

use App\Repositories\Admin\Auth\AdminAuthRepository;
use App\Repositories\Admin\Auth\AdminAuthRepositoryInterface;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
