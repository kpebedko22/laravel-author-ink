<?php

namespace App\Packages\Filter\PredefinedParams;

use App\Packages\Filter\Contracts\PredefinedParamsContract;

class RelatedParams implements PredefinedParamsContract
{
    public function __construct(
        protected array $params
    )
    {
    }

    public function apply(array $params): array
    {
        foreach ($this->params as $newKey => $relatives) {
            $tmp = [];

            foreach ($relatives as $relativeKey => $relativeDefaultValue) {
                $tmp[] = $params[$relativeKey] ?? $relativeDefaultValue;
            }

            $params[$newKey] = $tmp;
        }

        return $params;
    }
}
