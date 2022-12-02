<?php

namespace App\Http\Requests\Admin\Books;

class BookUpdateRequest extends BookRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255',],
            'genres' => ['required', 'integer', 'exists:genres,id',],
        ];
    }
}
