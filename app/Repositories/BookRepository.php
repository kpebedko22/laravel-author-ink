<?php

namespace App\Repositories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Collection;

final class BookRepository
{
    public static function index(): Collection
    {
        return Book::query()
            ->with(['author'])
            ->get();
    }

    public static function show(int $id): Book
    {
        /** @var Book $book */
        $book = Book::with(['author'])->findOrFail($id);

        return $book;
    }

    public static function getById(int $id): Book
    {
        return Book::findOrFail($id);
    }

    public static function isAvailable(Author $author, int $id): bool
    {
        return Book::available($author)
            ->where('id', $id)
            ->exists();
    }
}
