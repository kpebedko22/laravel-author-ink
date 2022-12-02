<?php

namespace App\Packages\Filter\Examples;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use App\Packages\Filter\ConcreteParams\ArrayParams;
use App\Packages\Filter\ConcreteParams\BooleanParams;
use App\Packages\Filter\EloquentFilter;
use App\Packages\Filter\PredefinedParams\DefaultParams;
use App\Packages\Filter\PredefinedParams\RelatedParams;

final class BookFilter extends EloquentFilter
{
    protected function getConcreteParams(): array
    {
        return [
            (new ArrayParams(['genres_ids'])),
            (new BooleanParams(['is_published'])),
        ];
    }

    protected function getPredefinedParams(): array
    {
        return [
            (new DefaultParams([
                'is_published' => true,
            ])),
            (new RelatedParams([
                'date' => [
                    'start_date' => Carbon::now()->subDays(7)->startOfDay(),
                    'end_date' => Carbon::now()->endOfDay(),
                ]
            ]))
        ];
    }

    public function genresIds(array $genresIds): Builder
    {
        return $this->builder->whereHas('genres', function (Builder $query) use ($genresIds) {
            $query->whereIn('id', $genresIds);
        });
    }

    public function isPublished(bool $isPublished): Builder
    {
        return $this->builder->where('is_published', $isPublished);
    }
}
