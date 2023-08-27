<?php

namespace App\Http\Resources\Api\v1\Authors;

use App\Http\Resources\Api\v1\Books\BookResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Author $resource
 */
class AuthorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'birthday' => $this->resource->birthday,
            'books' => $this->whenLoaded(
                'books',
                fn() => BookResource::collection($this->resource->books)
            ),
            'books_count' => $this->whenCounted(
                'books',
                fn() => $this->resource->books_count
            ),
        ];
    }
}
