<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

final class UserRepository
{
    public static function options(): Collection
    {
        return User::pluck('name', 'id');
    }
}
