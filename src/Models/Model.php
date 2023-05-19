<?php

namespace Envoo\LaravelApiTools\Models;

use Envoo\LaravelApiTools\Traits\CamelCasting;
use Envoo\LaravelApiTools\Traits\Filterable;
use Envoo\LaravelApiTools\Traits\InteractWithPagination;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use InteractWithPagination;
    use Filterable;
    use CamelCasting;
}