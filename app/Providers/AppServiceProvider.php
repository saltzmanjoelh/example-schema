<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        xdebug_break();
        if (app()->runningInConsole()) {
            return;
        }
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'schema-migrations');
    }
}
