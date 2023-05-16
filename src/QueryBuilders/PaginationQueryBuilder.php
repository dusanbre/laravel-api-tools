<?php

namespace Envoo\LaravelApiTools\QueryBuilders;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PaginationQueryBuilder extends Builder
{

    public function paginateUnderCondition(Request $request): Collection|LengthAwarePaginator|array
    {
        return $request->exists('limit')
            ? $this->paginate($request->query('limit', 25))
            : $this->get();
    }

    public function paginateAnyway(Request $request): LengthAwarePaginator
    {
        return $this->paginate($request->query('limit', 25));
    }
}