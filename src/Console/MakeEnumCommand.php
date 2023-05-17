<?php

namespace Envoo\LaravelApiTools\Console;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;

class MakeEnumCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    /*
     * List of model properties that should be returned in the resource
     */
    protected $name = 'envoo:make:enum';

    protected $description = 'Create a new Enum class';

    protected $type = 'Enum';

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/enum.stub');
    }

    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Enums';
    }
}