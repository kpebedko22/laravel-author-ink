<?php

namespace App\Http\Requests\Admin\Books;

class BookUpsertRequest extends BookRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'year' => [
                'required',
                'digits:4',
                'integer',
                'min:1900',
                'max:' . (now()->year + 1)
            ],
            'genre' => ['required', 'string', 'max:255'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
        ];
    }

    public function getData(): array
    {
        return parent::validated();
    }
}
