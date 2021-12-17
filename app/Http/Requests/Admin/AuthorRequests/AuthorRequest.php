<?php

namespace App\Http\Requests\Admin\AuthorRequests;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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
