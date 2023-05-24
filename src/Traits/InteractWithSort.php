<?php

namespace Envoo\LaravelApiTools\Traits;

trait InteractWithSort
{
    public static bool $enforceSort = true;

    public static string $sortField = 'id';

    public static string $sortDirection = 'desc';

    protected static function bootInteractWithSort(): void
    {
        if (static::$enforceSort) {
            static::addGlobalScope('sort', function ($query) {
                $query->orderBy(static::$sortField, static::$sortDirection);
            });
        }
    }
}