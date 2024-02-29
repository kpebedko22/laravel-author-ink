<?php

namespace App\Models;

use Database\Factories\FollowerFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Follower
 *
 * @property int $id
 * @property int $follower_id
 * @property int $following_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Author $follower
 * @property-read Author $following
 *
 * @method static FollowerFactory factory($count = null, $state = [])
 * @method static Builder|Follower newModelQuery()
 * @method static Builder|Follower newQuery()
 * @method static Builder|Follower query()
 *
 * @mixin Eloquent
 */
class Follower extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function follower(): BelongsTo|Author
    {
        return $this->belongsTo(Author::class, 'follower_id', 'id');
    }

    public function following(): BelongsTo|Author
    {
        return $this->belongsTo(Author::class, 'following_id', 'id');
    }
}
