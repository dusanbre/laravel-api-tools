<?php

namespace Envoo\LaravelApiTools\Console;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;

class MakeResourceCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    protected $name = 'envoo:make:resource';

    protected $description = 'Create a new Resource class';

    protected $type = 'Resource';

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/resources.stub');
    }

    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Http\Resources\V'.config('laravel-api-tools.api_version');
    }
}