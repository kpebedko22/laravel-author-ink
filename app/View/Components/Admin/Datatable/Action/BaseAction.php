<?php

namespace App\View\Components\Admin\Datatable\Action;

use Illuminate\View\Component;

class BaseAction extends Component
{
    protected string $name;
    protected string $url;

    public function __construct(string $name, string $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    public function render(): string
    {
        return view('components.admin.datatable.action.' . $this->name, [
            'url' => $this->url,
        ]);
    }
}
