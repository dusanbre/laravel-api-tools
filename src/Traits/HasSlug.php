<?php

namespace Envoo\LaravelApiTools\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(static fn(self $model) => $model->slug ?: $model->setAttribute('slug', Str::slug($model->name)));
    }
}