<?php

namespace Envoo\LaravelApiTools;

use Illuminate\Support\ServiceProvider;

class LaravelApiToolsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/laravel-api-tools.php', 'laravel-api-tools');

        if (function_exists('config_path') && $this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/laravel-api-tools.php' => config_path('laravel-api-tools.php'),
            ], 'config');
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\MakeFilterCommand::class,
            ]);
        }
    }

    public function register()
    {
    }
}