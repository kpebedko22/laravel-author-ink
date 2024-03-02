<?php

namespace App\Models;

use Database\Factories\AuthorFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
 * @property-read Collection<int, Author> $authorFollowers
 * @property-read int|null $author_followers_count
 * @property-read Collection<int, Author> $authorFollowings
 * @property-read int|null $author_followings_count
 * @property-read Collection<int, Follower> $followers
 * @property-read int|null $followers_count
 * @property-read Collection<int, Follower> $followings
 * @property-read int|null $followings_count
 *
 * @mixin Eloquent
 */
class Author extends Authenticatable implements HasMedia
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        InteractsWithMedia;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'bool',
        'password' => 'hashed',
    ];

    protected $attributes = [
        'is_admin' => false,
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->useDisk('authors-avatars')
            ->singleFile();

        $this
            ->addMediaCollection('coverImage')
            ->useDisk('authors-cover-images')
            ->singleFile();
    }

    public function books(): HasMany|Book
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }

    /**
     * Те, кто подписаны на автора
     */
    public function followers(): HasMany|Follower
    {
        return $this->hasMany(Follower::class, 'following_id', 'id');
    }

    /**
     * Те, на кого подписан на автора
     */
    public function followings(): HasMany|Follower
    {
        return $this->hasMany(Follower::class, 'follower_id', 'id');
    }

    public function authorFollowers(): BelongsToMany|Author
    {
        return $this
            ->belongsToMany(
                Author::class,
                'followers',
                'following_id',
                'follower_id',
            );
    }

    public function authorFollowings(): BelongsToMany|Author
    {
        return $this
            ->belongsToMany(
                Author::class,
                'followers',
                'follower_id',
                'following_id',
            );
    }
}
