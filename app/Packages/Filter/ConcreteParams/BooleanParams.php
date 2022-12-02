<?php

namespace App\Packages\Filter\ConcreteParams;

use Illuminate\Http\Request;
use App\Packages\Filter\Contracts\ConcreteParamsContract;

final class BooleanParams implements ConcreteParamsContract
{
    public function __construct(
        protected array $params
    )
    {
    }

    public function check(array $params, Request $request): array
    {
        $result = [];

        array_walk($params, function ($value, $key) use (&$result, $request) {
            $result[$key] = in_array($key, $this->params) && !is_bool($value)
                ? $request->boolean($key)
                : $value;
        });

        return $result;
    }
}
