<?php

namespace App\Http\Requests\Api\v1\BookRequests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BookRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            "name.required" => __("Name is required."),
            'year.required' => __('Year is required.'),
            'genre.required' => __('Genre is required.'),
        ];
    }
}
