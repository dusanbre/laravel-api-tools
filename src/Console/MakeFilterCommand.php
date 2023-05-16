<?php

namespace Envoo\LaravelApiTools\Console;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;

class MakeFilterCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    /*
     * List of model properties that should be returned in the resource
     */
    protected $name = 'envoo:make:filter';

    protected $description = 'Create a new Filter class';

    protected $type = 'Filter';

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/filter.stub');
    }

    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Http\Filters\V'.config('laravel-api-tools.api_version');
    }
}