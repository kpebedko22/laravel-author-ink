<?php

namespace App\Packages\Filter\Contracts;

interface PredefinedParamsContract
{
    public function apply(array $params): array;
}
