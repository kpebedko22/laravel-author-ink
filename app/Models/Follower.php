<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
