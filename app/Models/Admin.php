<?php

namespace App\Models;

use Database\Factories\AdminFactory;
use Eloquent;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property mixed $password
 * @property string|null $remember_token
 * @property string|null $email_verified_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 *
 * @method static AdminFactory factory($count = null, $state = [])
 * @method static Builder|Admin newModelQuery()
 * @method static Builder|Admin newQuery()
 * @method static Builder|Admin query()
 *
 * @mixin Eloquent
 */
class Admin extends Authenticatable implements FilamentUser
{
    use HasFactory,
        Notifiable;

    protected $guarded = ['id'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
