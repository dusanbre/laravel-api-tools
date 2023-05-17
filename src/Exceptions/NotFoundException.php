<?php

namespace Envoo\LaravelApiTools\Exceptions;

use Envoo\LaravelApiTools\Enums\HttpEnum;

class NotFoundException extends GlobalException
{
    public static function modelNotFound(string $model = 'Model', HttpEnum|int $code = HttpEnum::NOT_FOUND): NotFoundException
    {
        return new self("{$model} not found.", $code instanceof HttpEnum ? $code() : 404);
    }

    public static function undefinedCaseError(string $enum, string $case): NotFoundException
    {
        return new self("Undefined constant $enum::$case.");
    }
}