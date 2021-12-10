<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'genre',
        'author_id',
    ];

    public function Author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
