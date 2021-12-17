<?php

namespace App\Http\Resources\Api\v1\AuthorResources;

use App\Http\Resources\Api\v1\AuthorResources\AuthorResource;

class AuthorWithBooksCountResource extends AuthorResource
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
            'numBooks' => $this->Books->count(),
        ];
    }
}
