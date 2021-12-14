<?php

namespace App\Http\Requests;

use App\Http\Requests\AuthenticationRequest;

class AuthenticationSignInRequest extends AuthenticationRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
}
