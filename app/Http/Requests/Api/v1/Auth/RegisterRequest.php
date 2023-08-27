<?php

namespace App\Http\Requests\Api\v1\AuthenticationRequests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:authors,email'],
            'password' => ['required', 'string', 'min:6'],
            'username' => ['required', 'string', 'max:255', 'unique:authors,username'],
            'birthday' => ['required', 'date'],
        ];
    }

    public function getData(): array
    {
        return parent::validated();
    }
}
