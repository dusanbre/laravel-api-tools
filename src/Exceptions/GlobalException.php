<?php

namespace Envoo\LaravelApiTools\Exceptions;

use Exception;

class GlobalException extends Exception
{
    public static function internalException(): static
    {
        return new static('Internal server error');
    }
}