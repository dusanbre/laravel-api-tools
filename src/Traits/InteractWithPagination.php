<?php

namespace Envoo\LaravelApiTools\Traits;


use Envoo\LaravelApiTools\QueryBuilders\PaginationQueryBuilder;

trait InteractWithPagination
{
    public function newEloquentBuilder($query): PaginationQueryBuilder
    {
        return new PaginationQueryBuilder($query);
    }
}