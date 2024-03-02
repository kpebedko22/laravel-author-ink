<?php

namespace App\Services\Followers;

use App\Exceptions\FollowerException;
use App\Models\Author;
use App\Models\Follower;

class FollowerService
{
    public function store(Author $follower, int $followingId): Follower
    {
        if ($follower->id === $followingId) {
            throw FollowerException::followYourselfIsForbidden();
        }

        $follow = Follower::query()
            ->firstOrCreate([
                'follower_id' => $follower->id,
                'following_id' => $followingId,
            ]);

        if (!$follow->wasRecentlyCreated) {
            throw FollowerException::alreadyFollowed();
        }

        return $follow;
    }

    public function destroy(Author $follower, int $followingId): bool
    {
        if ($follower->id === $followingId) {
            throw FollowerException::unfollowYourselfIsForbidden();
        }

        $isDeleted = (bool)Follower::query()
            ->where([
                'follower_id' => $follower->id,
                'following_id' => $followingId,
            ])
            ->delete();

        if (!$isDeleted) {
            throw FollowerException::alreadyUnfollowed();
        }

        return true;
    }
}
