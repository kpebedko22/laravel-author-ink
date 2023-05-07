<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $author_id
 * @property string $name
 * @property string $year
 * @property string $genre
 *
 * @property-read Author $author
 *
 * @mixin Eloquent
 */
class Book extends Model
{
    protected $fillable = [
        'name',
        'year',
        'genre',
        'author_id',
    ];

    public function author(): BelongsTo|Author
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
