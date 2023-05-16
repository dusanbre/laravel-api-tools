<?php

namespace Envoo\LaravelApiTools;

use Envoo\LaravelApiTools\Console\MakeFilterCommand;
use Envoo\LaravelApiTools\Console\MakeResourceCommand;
use Illuminate\Support\ServiceProvider;

class LaravelApiToolsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/laravel-api-tools.php', 'laravel-api-tools');


        $this->publishes([
            __DIR__.'/config/laravel-api-tools.php' => config_path('laravel-api-tools.php'),
        ], 'config');


        $this->commands([
            MakeFilterCommand::class,
            MakeResourceCommand::class
        ]);
    }

    public function register()
    {
    }
}