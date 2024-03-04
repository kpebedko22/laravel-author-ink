<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ListAuthors extends Component
{
    use WithPagination;

    #[Layout('layouts.app')]
    public function render(): View
    {
        $authors = Author::query()->paginate();

        return view('livewire.authors.list-authors', ['authors' => $authors])
            ->title(__('web/authors.list.label.title'));
    }
}
