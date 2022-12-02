<?php

namespace App\Packages\Filter\Contracts;

use Illuminate\Http\Request;

interface ConcreteParamsContract
{
    public function check(array $params, Request $request): array;
}
