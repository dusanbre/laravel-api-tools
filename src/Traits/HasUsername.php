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
        $username = static::query()
            ->where('username', 'regexp', preg_quote($value).'[\\d]?$')
            ->orderByDesc('username')
            ->take(1)
            ->value('username');

        $number = (int)filter_var($username, FILTER_SANITIZE_NUMBER_INT);

        return $number === 0 ? $value : $value.++$number;
    }
}