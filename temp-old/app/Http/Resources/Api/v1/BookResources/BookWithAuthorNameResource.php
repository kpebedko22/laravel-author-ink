<?php

namespace App\Http\Resources\Api\v1\BookResources;

use App\Http\Resources\Api\v1\BookResources\BookResource;

class BookWithAuthorNameResource extends BookResource
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
            'authorName' => $this->Author->name,
        ];
    }
}
