<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

#[Lazy]
class ListAuthors extends Component
{
    use WithPagination;

    public function placeholder(): View
    {
        return view('components.web.placeholders.list-authors');
    }

    #[Layout('layouts.app')]
    public function render(): View
    {
        $authors = Author::query()->paginate();

        return view('livewire.authors.list-authors', ['authors' => $authors])
            ->title(__('web/authors.list.label.title'));
    }
}
