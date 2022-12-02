<?php

namespace App\Traits\Models;

use App\Services\Common\Filters\QueryFilter;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static filter(QueryFilter $filter)
 *
 * @mixin Eloquent
 */
trait Filterable
{
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
