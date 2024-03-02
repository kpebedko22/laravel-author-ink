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
        return Book::query()->with(['author'])->findOrFail($id);
    }

    public static function getById(int $id): Book
    {
        return Book::query()->findOrFail($id);
    }

    public static function isAvailable(Author $author, int $id): bool
    {
        return Book::query()
            ->available($author)
            ->where('id', $id)
            ->exists();
    }
}
