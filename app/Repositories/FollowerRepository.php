<?php

namespace App\Repositories;

use App\DTOs\Web\Authors\AuthorFollowerDTO;
use App\DTOs\Web\Pagination\PaginatedDTO;
use App\Models\Author;

final class FollowerRepository
{
    /**
     * Список подписанных на $author
     */
    public function listFollowers(Author $author, int $page, bool $listFollowings = false): PaginatedDTO
    {
        $relation = $listFollowings
            ? $author->authorFollowings()
            : $author->authorFollowers();

        $paginated = $relation
            ->orderByDesc('followers.created_at')
            ->paginate(page: $page);

        $items = collect($paginated->items())
            ->map(static function (Author $follower) {
                return new AuthorFollowerDTO(
                    $follower->id,
                    $follower->name,
                    $follower->username,
                );
            });

        return new PaginatedDTO(
            $items,
            $paginated->hasMorePages(),
        );
    }
}
