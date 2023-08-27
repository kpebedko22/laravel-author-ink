<?php

namespace App\Http\Resources\Api\v1\Books;

use App\Http\Resources\Api\v1\Authors\AuthorResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Book $resource
 */
class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->name,
            'year' => $this->resource->year,
            'genre' => $this->resource->genre,
            'author' => $this->whenLoaded(
                'author',
                fn() => AuthorResource::make($this->resource->author)
            )
        ];
    }
}
