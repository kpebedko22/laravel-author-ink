<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin Eloquent
 */
class Genre extends Model
{
    protected $fillable = [
        'name',
    ];

    public function books(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Book::class,
                'book_genre',
                'genre_id',
                'book_id',
                'id',
                'id',
            )->withPivot([
                'order'
            ]);
    }
}
