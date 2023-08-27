<?php

namespace App\DTOs\Api\v1\Books;

use Illuminate\Contracts\Support\Arrayable;

final class BookUpsertDTO implements Arrayable
{
    public function __construct(
        protected string   $title,
        protected string   $genre,
        protected string   $year,
        protected int|null $authorId,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->title,
            'genre' => $this->genre,
            'year' => $this->year,
            'author_id' => $this->authorId,
        ];
    }
}
