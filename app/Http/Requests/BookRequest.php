<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // $id = request('id') ?: 'NULL'; //To identify if request is for add or edit just take autoincremented id parameter form request.

        // return [
        //     'name' => 'required|unique:users,name,' . $id
        // ];

        switch ($this->method()) {
            case 'POST':
                
                return [
                    'name' => 'required|string|max:255',
                    'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
                    'genre' => 'required|string|max:255',
                    'author_id' => 'nullable|integer|exists:authors,id',
                ];
                break;

            case 'PUT':

                return [
                    'name' => 'nullable',
                    // validation for put method
                ];
                break;
            default:
                return [];
                break;
        }
    }

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
