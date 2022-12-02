<?php

namespace App\View\Components\Admin\Datatable\Filter;

use Illuminate\View\Component;

abstract class BaseFilter extends Component
{
    protected string $value = '';
    protected string $name = '';
    protected string $htmlAttributes = '';
    protected array $options = [];
    protected array $selectedOptions = [];

    public function __construct(array $params)
    {
        $this->value = $params['value'] ?? '';
        $this->name = $params['name'] ?? '';
        $this->htmlAttributes = $params['htmlAttributes'] ?? '';
        $this->options = $params['options'] ?? [];
        $this->selectedOptions = $params['selectedOptions'] ?? [];
    }
}
