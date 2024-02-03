<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property Author $author
 */
class ViewAuthor extends Component
{
    public int $authorId;

    #[Computed]
    public function author(): Author
    {
        return Author::query()
            ->withCount([
                'books',
                'followers',
                'followings',
            ])
            ->findOrFail($this->authorId);
    }

    public function follow(): void
    {
        Debugbar::info('followed');
    }

    public function render(): View
    {
        $topBooks = $this->author->books()->limit(3)->get();

        return view(
            'livewire.authors.view-author',
            [
                'title' => $this->author->name,
                'topBooks' => $topBooks,
            ])
            ->extends('layouts.web.app')
            ->title($this->author->name);
    }
}
