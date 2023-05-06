<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Packages\Enum\Examples\UserTypeEnum;
use Eloquent;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property UserTypeEnum $type
 *
 * @mixin Eloquent
 */
class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'type' => UserTypeEnum::class,
    ];

    protected $attributes = [
        'type' => UserTypeEnum::ADMIN,
    ];

    public function canAccessFilament(): bool
    {
        return $this->type->id === UserTypeEnum::ADMIN;
    }
}
