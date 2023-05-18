<?php

namespace Envoo\LaravelApiTools\Traits;

use Illuminate\Support\Str;

trait HasUsername
{
    protected static function bootHasUsername(): void
    {
        static::creating(static fn(self $model) => $model->username ?: $model->setAttribute('username', static::generateUniqueUsername(Str::slug($model->name))));
    }

    protected static function generateUniqueUsername(string $value): string
    {
        $count = static::query()
            ->where('username', 'like', $value.'%')
            ->count();

        return $value.'-'.$count;
    }
}