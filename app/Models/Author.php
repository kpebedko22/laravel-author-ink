<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $username
 * @property bool $is_admin
 * @property string $birthday
 *
 * @property-read Collection<Book> $books
 * @property-read int $books_count
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

    public function books(): HasMany|Book
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn($value) => Hash::make($value),
        );
    }
}
