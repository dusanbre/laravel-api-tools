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
        $slug = static::query()
            ->where('slug', 'regexp', preg_quote($value).'[\\d]?$')
            ->orderByDesc('slug')
            ->take(1)
            ->value('slug');

        $number = (int)filter_var($slug, FILTER_SANITIZE_NUMBER_INT);

        return $number === 0 ? $value : $value.++$number;
    }
}