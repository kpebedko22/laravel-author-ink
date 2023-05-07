<?php

namespace App\Providers;

use App\Models\Author;
use Illuminate\Contracts\Auth\Authenticatable;

class EloquentUserProvider extends \Illuminate\Auth\EloquentUserProvider
{
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        /** @var Author $user */
        $canAccessAdmin = $user->is_admin;

        return $canAccessAdmin && parent::validateCredentials($user, $credentials);
    }

}
