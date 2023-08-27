<?php

namespace App\Http\Requests\Api\v1\Books;

use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Auth;

class BookDeleteRequest extends BookRequest
{
    public function authorize(): bool
    {
        return BookRepository::isAvailable(Auth::user(), $this->getBookId());
    }

    public function rules(): array
    {
        return [];
    }
}
