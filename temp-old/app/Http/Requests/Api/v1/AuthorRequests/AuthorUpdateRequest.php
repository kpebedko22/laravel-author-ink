<?php

namespace App\Http\Requests\Api\v1\AuthorRequests;

use App\Http\Requests\Api\v1\AuthorRequests\AuthorRequest;

class AuthorUpdateRequest extends AuthorRequest
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
            'birthday' => 'required|date',
            'password' => 'required|string|min:6',
        ];
    }
}
