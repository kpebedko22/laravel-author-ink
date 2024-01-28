<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property int $author_id
 * @property string $name
 * @property string $year
 * @property string $genre
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Author $author
 *
 * @method static Builder|Book available(Author $author)
 * @method static BookFactory factory($count = null, $state = [])
 * @method static Builder|Book newModelQuery()
 * @method static Builder|Book newQuery()
 * @method static Builder|Book query()
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
