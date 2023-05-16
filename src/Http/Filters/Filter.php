<?php

namespace Envoo\LaravelApiTools\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Filter
{
    /**
     * The request instance.
     */
    protected Request $request;

    /**
     * The builder instance.
     */
    protected Builder $builder;

    /**
     * The allowed filters
     */
    protected array $filters = [];

    /**
     * Initialize a new filter instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the filters on the builder.
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->getAllowedFilters() as $name => $value) {
            if (method_exists($this, $name)) {
                $this->$name($value);
            }
        }

        return $this->builder;
    }

    /**
     * Get allowed filter and setup region key
     */
    private function getAllowedFilters(): array
    {
        return Arr::collapse([$this->getAllowedParameters(), ['byUser' => $this->request->user()->id]]);
    }

    /**
     * Get allowed parameters from Request instance
     */
    private function getAllowedParameters(): array
    {
        return method_exists($this->request, 'validated') ? $this->request->validated() : $this->request->only($this->filters);
    }
}