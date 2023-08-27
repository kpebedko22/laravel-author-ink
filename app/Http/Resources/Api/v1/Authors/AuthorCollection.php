<?php

namespace App\Http\Resources\Api\v1\Authors;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AuthorCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'authors' => $this->resource,
        ];
    }
}
