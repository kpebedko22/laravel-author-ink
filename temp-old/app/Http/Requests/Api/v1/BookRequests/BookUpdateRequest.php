<?php

namespace App\Http\Requests\Api\v1\BookRequests;

use App\Http\Requests\Api\v1\BookRequests\BookRequest;

class BookUpdateRequest extends BookRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'year' => 'nullable|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'genre' => 'nullable|string|max:255',
        ];
    }
}
