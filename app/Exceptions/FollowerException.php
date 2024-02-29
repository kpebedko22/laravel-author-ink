<?php

namespace App\Exceptions;

use RuntimeException;

final class FollowerException extends RuntimeException
{
    public static function followYourselfIsForbidden(): FollowerException
    {
        return new self('followYourselfIsForbidden');
    }

    public static function alreadyFollowed(): FollowerException
    {
        return new self('alreadyFollowed');
    }

    public static function unfollowYourselfIsForbidden(): FollowerException
    {
        return new self('unfollowYourselfIsForbidden');
    }

    public static function alreadyUnfollowed(): FollowerException
    {
        return new self('alreadyUnfollowed');
    }
}
