<?php

namespace App\Models;

use App\Services\Common\Filters\QueryFilter;
use App\Traits\Models\Filterable;
use App\Traits\Models\HasOrder;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use \Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $author_id
 * @property string $name
 *
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @property-read User $author
 * @property-read Genre[]|Collection $genres
 *
 * @method static Book|EloquentBuilder|QueryBuilder withTrashed(bool $withTrashed = true)
 * @method static Book|EloquentBuilder|QueryBuilder filter(QueryFilter $filter)
 *
 * @mixin Eloquent
 */
class Book extends Model
{
    use HasFactory,
        Filterable,
        HasOrder,
        SoftDeletes,
        Sluggable;

    protected $fillable = [
        'author_id',
        'title',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(
            Genre::class,
            'books_genres',
            'book_id',
            'genre_id',
            'id',
            'id'
        );
    }
}
