<?php

namespace App\Packages\Filter\PredefinedParams;

use App\Packages\Filter\Contracts\PredefinedParamsContract;

class DefaultParams implements PredefinedParamsContract
{
    public function __construct(
        protected array $params,
    )
    {
    }

    public function apply(array $params): array
    {
        $existsKeys = array_keys($params);

        foreach ($this->params as $key => $value) {
            if (!in_array($key, $existsKeys)) {
                $params[$key] = $value;
            }
        }

        return $params;
    }
}
