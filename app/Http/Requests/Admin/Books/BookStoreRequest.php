<?php

namespace App\Http\Requests\Admin\Books;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255',],
            'genres' => ['required', 'array',],
            'genres.*' => ['required', 'integer', 'exists:genres,id',],
        ];
    }

    public function getData()
    {

    }
}
