<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Author;
use Illuminate\Contracts\Auth\Authenticatable;

class EloquentUserProvider extends \Illuminate\Auth\EloquentUserProvider
{
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        $canAccessAdmin = match (true) {
            $user instanceof Author => $user->is_admin,
            $user instanceof Admin => true,
            default => false,
        };

        return $canAccessAdmin && parent::validateCredentials($user, $credentials);
    }
}
