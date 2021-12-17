<?php

namespace App\Http\Requests\Admin\AuthenticationRequests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticationRequest extends FormRequest
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
