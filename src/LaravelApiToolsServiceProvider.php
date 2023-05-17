<?php

namespace Envoo\LaravelApiTools;

use Envoo\LaravelApiTools\Console\MakeEnumCommand;
use Envoo\LaravelApiTools\Console\MakeFilterCommand;
use Envoo\LaravelApiTools\Console\MakeResourceCommand;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class LaravelApiToolsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        JsonResource::withoutWrapping();

        $this->mergeConfigFrom(__DIR__.'/config/laravel-api-tools.php', 'laravel-api-tools');


        $this->publishes([
            __DIR__.'/config/laravel-api-tools.php' => config_path('laravel-api-tools.php'),
        ], 'config');


        $this->commands([
            MakeFilterCommand::class,
            MakeResourceCommand::class,
            MakeEnumCommand::class
        ]);
    }

    public function register()
    {
    }
}