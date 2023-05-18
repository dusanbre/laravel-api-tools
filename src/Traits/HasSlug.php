<?php

namespace Envoo\LaravelApiTools\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(static fn(self $model) => $model->slug ?: $model->setAttribute('slug', static::generateUniqueSlug(Str::slug($model->name))));
    }

    protected static function generateUniqueSlug(string $value): string
    {
        $count = static::query()
            ->where('slug', 'like', $value)
            ->count();

        return $value.'-'.$count;
    }
}