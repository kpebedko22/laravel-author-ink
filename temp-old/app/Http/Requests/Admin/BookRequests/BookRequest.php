<?php

namespace App\Http\Requests\Admin\BookRequests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'genre' => 'required|string|max:255',
            'author_id' => 'required|integer|exists:authors,id',
        ];
    }
}
