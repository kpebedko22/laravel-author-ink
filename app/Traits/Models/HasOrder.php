<?php

namespace App\Traits\Models;

use Eloquent;
use Illuminate\Database\Query\Builder;

/**
 * @mixin Eloquent
 */
trait HasOrder
{
    public function scopeOrder(Builder $builder, QueryOrder $order)
    {
        return $order->apply($builder);
    }
}
