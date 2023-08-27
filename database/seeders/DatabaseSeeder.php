<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        collect(range(0, 19))
            ->each(function () {
                Author::factory()
                    ->has(Book::factory(rand(1, 10)))
                    ->create();
            });
    }
}
