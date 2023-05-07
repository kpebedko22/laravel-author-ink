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

    public function Author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
