<?php

namespace App\Http\Livewire\Web\Books;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class BooksListing extends Component
{
    use WithPagination;

    public Collection $books;

    protected LengthAwarePaginator $paginator;

    public int $loadMorePage = 1;

    public bool $hasMorePages;

    public bool $isLoadingMore = false;

    public function mount(): void
    {
        $this->books = new Collection();
    }

    public function loadMoreTrigger(): void
    {
        $this->isLoadingMore = true;
    }

    public function loadMore(bool $isLoadingMore): void
    {
        if (!$isLoadingMore) {
            $this->loadMorePage = $this->page;
        }

        $this->paginator = Book::with(['author'])
            ->paginate(12, ['*'], 'page', $this->loadMorePage);

        $this->paginators['page'] = $this->loadMorePage;

        $this->loadMorePage += 1;

        $this->hasMorePages = $this->paginator->hasMorePages();

        if ($isLoadingMore) {
            $this->books->push(...$this->paginator->items());
        } else {
            $this->books = new Collection($this->paginator->items());
        }
    }

    public function render()
    {
        $this->loadMore($this->isLoadingMore);

        $this->isLoadingMore = false;

        return view('livewire.web.books.books-listing', [
            'paginator' => $this->paginator,
        ]);
    }
}
