<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @method static Book findOrFail($id)
 * @method static Book|Builder available(Author $author)
 *
 * @mixin Eloquent
 */
class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function author(): BelongsTo|Author
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function scopeAvailable(Builder $builder, Author $author): Builder
    {
        return $author->is_admin
            ? $builder
            : $builder->where('author_id', $author->id);
    }
}
