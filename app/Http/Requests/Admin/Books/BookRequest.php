<?php

namespace App\Http\Requests\Admin\Books;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }

    public function getBook(): Book
    {
        return Book:: findOrFail($this->route('book_id'));
    }
}
