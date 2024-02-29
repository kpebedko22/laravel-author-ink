<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use App\Services\Followers\FollowerService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Throwable;

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

    public function isFollowed(): bool
    {
        return (bool)Auth::user()?->followings()->where(['following_id' => $this->author->id])->exists();
    }

    public function follow(): void
    {
        $follower = Auth::user();

        if (!$follower) {
            $this->notify('can not follow');

            return;
        }

        try {
            (new FollowerService)->store($follower, $this->author);

            $this->author->loadCount(['followers', 'followings']);

            $this->notify('Successfully followed');
        } catch (Throwable $ex) {
            $this->notify($ex->getMessage());
        }
    }

    public function unfollow(): void
    {
        $follower = Auth::user();

        if (!$follower) {
            $this->notify('can not unfollow');

            return;
        }

        try {
            (new FollowerService)->destroy($follower, $this->author);

            $this->author->loadCount(['followers', 'followings']);

            $this->notify('Successfully unfollowed');
        } catch (Throwable $ex) {
            $this->notify($ex->getMessage());
        }
    }

    #[Layout('layouts.app')]
    public function render(): View
    {
        $topBooks = $this->author->books()->limit(3)->get();

        return view(
            'livewire.authors.view-author',
            [
                'topBooks' => $topBooks,
            ])
            ->title($this->author->name);
    }
}
