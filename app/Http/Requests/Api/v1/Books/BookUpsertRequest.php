<?php

namespace App\Http\Requests\Api\v1\Books;

use App\DTOs\Api\v1\Books\BookUpsertDTO;
use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Если авторизован админ - то author_id обязательно
 * Иначе - author_id не ожидается
 */
class BookUpsertRequest extends BookRequest
{
    public function authorize(): bool
    {
        return !$this->isMethod('put') ||
            BookRepository::isAvailable(Auth::user(), $this->getBookId());
    }

    public function rules(): array
    {
        $authorIdRule = Auth::user()->is_admin
            ? ['author_id' => ['required', 'integer', 'exists:authors,id']]
            : [];

        return array_merge([
            'title' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'year' => [
                'required',
                'integer',
                'digits:4',
                'min:1900',
                'max:' . (now()->year + 1)
            ],
        ], $authorIdRule);
    }

    public function getData(): BookUpsertDTO
    {
        return new BookUpsertDTO(
            parent::validated('title'),
            parent::validated('genre'),
            parent::validated('year'),
            parent::validated('author_id', Auth::id()),
        );
    }
}
