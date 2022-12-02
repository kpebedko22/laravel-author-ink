<?php

namespace App\Packages\Filter;

use Illuminate\Database\Eloquent\Builder;
use App\Packages\Filter\Abstract\BaseFilter;

class EloquentFilter extends BaseFilter
{
    protected Builder $builder;

    public function apply($filterable)
    {
        // TODO: Implement apply() method.
    }

    // I would like set a function that will be applied to array filters
    // I should set trait to eloquent-filter not to a final filter class
    // And I would like set
}
