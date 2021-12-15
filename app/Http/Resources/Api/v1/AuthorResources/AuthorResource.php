<?php

namespace App\Http\Resources\Api\v1\AuthorResources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'birthday' => $this->birthday,
            'username' => $this->username,
            'email' => $this->email,
            'isAdmin' => $this->is_admin,
        ];
    }
}
