<?php

namespace Envoo\LaravelApiTools\Traits;

use Illuminate\Support\Str;

trait HasUsername
{
    protected static function bootHasUsername(): void
    {
        static::creating(static fn(self $model) => $model->username ?: $model->setAttribute('username', Str::slug($model->name)));
    }
}