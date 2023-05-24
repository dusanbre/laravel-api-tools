<?php

namespace Envoo\LaravelApiTools\Models;

use Envoo\LaravelApiTools\Traits\CamelCasting;
use Envoo\LaravelApiTools\Traits\Filterable;
use Envoo\LaravelApiTools\Traits\InteractWithPagination;
use Envoo\LaravelApiTools\Traits\InteractWithSort;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use InteractWithPagination;
    use Filterable;
    use CamelCasting;
    use InteractWithSort;
}