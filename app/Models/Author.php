<?php

namespace App\Models;

use Database\Factories\AuthorFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\Author
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property bool $is_admin
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $birthday
 * @property string $cover_color
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Collection<int, Book> $books
 * @property-read int|null $books_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 *
 * @method static AuthorFactory factory($count = null, $state = [])
 * @method static Builder|Author newModelQuery()
 * @method static Builder|Author newQuery()
 * @method static Builder|Author query()
 *
 * @mixin Eloquent
 */
class Author extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'bool',
    ];

    protected $attributes = [
        'is_admin' => false,
    ];

    public function books(): HasMany|Book
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }

    public function followers(): HasMany|Follower
    {
        return $this->hasMany(Follower::class, 'following_id', 'id');
    }

    public function followings(): HasMany|Follower
    {
        return $this->hasMany(Follower::class, 'follower_id', 'id');
    }

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn($value) => Hash::make($value),
        );
    }
}
