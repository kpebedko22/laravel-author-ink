<?php

namespace App\Http\Requests\Api\v1\Books;

use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }

    public function getBookId(): int
    {
        return $this->route('book_id', 0);
    }

    public function getBook(): Book
    {
        return BookRepository::getById($this->getBookId());
    }
}
