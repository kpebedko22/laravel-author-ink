<?php

namespace App\Http\Resources\Api\v1\AuthorResources;

use App\Http\Resources\Api\v1\AuthorResources\AuthorResource;
use App\Http\Resources\Api\v1\BookResources\BookResource;

class AuthorWithBooksResource extends AuthorResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'books' => BookResource::collection($this->Books),
        ];
    }
}
