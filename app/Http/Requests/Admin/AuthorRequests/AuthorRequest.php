<?php

namespace App\Http\Requests\Admin\AuthorRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorRequest extends FormRequest
{
    public function rules(): array
    {
        $ignore_id = $this->toArray()['id'];

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('authors')->ignore($ignore_id, 'id')
            ],
            'password' => 'required|string|min:6',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('authors')->ignore($ignore_id, 'id')
            ],
            'birthday' => 'required|date',
        ];
    }
}
