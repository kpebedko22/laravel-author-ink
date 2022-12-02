<?php

namespace App\Packages\Filter\ConcreteParams;

use Closure;
use Illuminate\Http\Request;
use App\Packages\Filter\Contracts\ConcreteParamsContract;

final class ArrayParams implements ConcreteParamsContract
{
    public const COMMA_SEPARATE = 1;
    public const ARRAY = 2;

    protected Closure|null $closure;

    public function __construct(
        protected array $params,
        protected int   $type = ArrayParams::COMMA_SEPARATE
    )
    {
        $this->closure = null;
    }

    public function check(array $params, Request $request): array
    {
        $filterClosure = $this->getClosure();

        return array_merge(
            $params,
            array_map(
                $filterClosure,
                array_intersect_key(
                    $params,
                    $this->params
                )
            )
        );
    }

    protected function getClosure(): Closure
    {
        return $this->closure ?: match ($this->type) {
            ArrayParams::COMMA_SEPARATE => fn(string $value) => array_filter(explode(',', $value)),
            ArrayParams::ARRAY => fn(array $value) => $value,
            default => fn($value) => $value,
        };
    }

    public function setClosure(Closure $closure): ArrayParams
    {
        $this->closure = $closure;

        return $this;
    }

    public function setType(int $type): ArrayParams
    {
        $this->type = $type;

        return $this;
    }
}
