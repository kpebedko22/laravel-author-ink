<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Support\Collection;

final class AuthorRepository
{
    public static function index(): Collection
    {
        return Author::all();
    }

    public static function show(int $id): Author
    {
        return Author::query()->with(['books'])->findOrFail($id);
    }

    public static function getById(int $id): Author
    {
        return Author::query()->findOrFail($id);
    }

    public static function statistic(): Collection
    {
        return Author::query()
            ->withCount(['books'])
            ->orderBy('books_count')
            ->get([
                'id',
                'name',
                'birthday',
            ]);
    }
}
