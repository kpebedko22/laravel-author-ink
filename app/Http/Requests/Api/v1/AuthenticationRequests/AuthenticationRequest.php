<?php

namespace App\Http\Requests\Api\v1\AuthenticationRequests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthenticationRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => 1,
            'message' => __('Validation errors'),
            'data' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            "name.required" => __("Name is required."),
        ];
    }
}
