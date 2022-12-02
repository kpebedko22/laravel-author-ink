<?php

namespace App\Packages\Filter\Abstract;

use Illuminate\Http\Request;
use App\Packages\Filter\Contracts\ConcreteParamsContract;
use App\Packages\Filter\Contracts\PredefinedParamsContract;

abstract class BaseFilter
{
    protected Request $request;
    protected array $params;

    public abstract function apply($filterable);

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->setParams($this->request->all());
    }

    public function setParams(array $params): static
    {
        $predefinedParams = $this->getPredefinedParams();

        /** @var PredefinedParamsContract $predefinedParam */
        foreach ($predefinedParams as $predefinedParam) {
            $params = $predefinedParam->apply($params);
        }

        $this->params = $params;

        return $this;
    }

    protected function fields(): array
    {
        $parameters = $this->params;

        // Remove whitespaces from strings
        $parameters = array_map(function ($item) {
            return is_string($item)
                ? trim($item)
                : $item;
        }, $parameters);

        // Remove null and empty string parameters
        $parameters = array_filter(
            $parameters,
            function ($value) {
                return !is_null($value) && $value !== '';
            }
        );

        // Get concrete parameters casters should be applied to $parameters
        $specificFilters = $this->getConcreteParams();

        /** @var ConcreteParamsContract $specificFilter */
        foreach ($specificFilters as $specificFilter) {
            $parameters = $specificFilter->check($parameters, $this->request);
        }

        return $parameters;
    }

    protected function getConcreteParams(): array
    {
        return [];
    }

    protected function getPredefinedParams(): array
    {
        return [];
    }
}
