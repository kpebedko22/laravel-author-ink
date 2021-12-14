<?php

namespace App\Http\Requests;

use App\Http\Requests\AuthenticationRequest;

class AuthenticationSignUpRequest extends AuthenticationRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:authors,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'username' => 'required|string|max:255|unique:authors,username',
            'birthday' => 'required|date',
        ];
    }
}
