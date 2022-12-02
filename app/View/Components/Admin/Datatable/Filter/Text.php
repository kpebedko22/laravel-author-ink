<?php

namespace App\View\Components\Admin\Datatable\Filter;

class Text extends BaseFilter
{
    public function render(): string
    {
        return view('components.admin.datatable.filter.text', [
            'value' => $this->value,
            'name' => $this->name,
            'htmlAttributes' => $this->htmlAttributes,
        ]);
    }
}
