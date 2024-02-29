<?php

namespace App\Services\Followers;

use App\Exceptions\FollowerException;
use App\Models\Author;
use App\Models\Follower;

class FollowerService
{
    public function store(Author $follower, Author $following): Follower
    {
        if ($follower->id === $following->id) {
            throw FollowerException::followYourselfIsForbidden();
        }

        $follow = Follower::query()
            ->firstOrCreate([
                'follower_id' => $follower->id,
                'following_id' => $following->id,
            ]);

        if (!$follow->wasRecentlyCreated) {
            throw FollowerException::alreadyFollowed();
        }

        return $follow;
    }

    public function destroy(Author $follower, Author $following)
    {
        if ($follower->id === $following->id) {
            throw FollowerException::unfollowYourselfIsForbidden();
        }

        $isDeleted = (bool)Follower::query()
            ->where([
                'follower_id' => $follower->id,
                'following_id' => $following->id,
            ])
            ->delete();

        if (!$isDeleted) {
            throw FollowerException::alreadyUnfollowed();
        }

        return true;
    }
}
