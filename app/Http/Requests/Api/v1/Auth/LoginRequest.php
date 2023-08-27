<?php

namespace App\Http\Requests\Api\v1\AuthenticationRequests;

use App\DTOs\Auth\AuthCredentials;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function getCredentials(): AuthCredentials
    {
        return new AuthCredentials(
            $this->validated('email', ''),
            $this->validated('password', ''),
        );
    }
}
