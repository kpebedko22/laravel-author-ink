<?php

namespace App\Livewire\Followers;

use App\Models\Author;
use App\Repositories\FollowerRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use LivewireUI\Modal\ModalComponent;

final class ListFollowersModal extends ModalComponent
{
    public Author $author;

    public bool $listFollowings = false;

    public Collection $followers;

    public int $page = 1;

    public bool $hasMore = false;

    public function mount(): void
    {
        $paginated = (new FollowerRepository)
            ->listFollowers($this->author, $this->page, $this->listFollowings);

        $this->followers = $paginated->items;
        $this->hasMore = $paginated->hasMore;
    }

    public function loadMore(): void
    {
        if (!$this->hasMore) {
            return;
        }

        $this->page++;

        $nextFollowers = (new FollowerRepository)
            ->listFollowers($this->author, $this->page, $this->listFollowings);

        $this->followers->push(...$nextFollowers->items);
        $this->hasMore = $nextFollowers->hasMore;
    }

    public function render(): View
    {
        return view('livewire.followers.list-followers-modal');
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
