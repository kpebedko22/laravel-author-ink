<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createDevAccount();

        collect(range(0, 19))
            ->each(function () {
                Author::factory()
                    ->has(Book::factory(rand(1, 10)))
                    ->create();
            });
    }

    private function createDevAccount(): void
    {
        $devEmail = config('app.developer_email');

        if ($devEmail) {
            Author::factory()
                ->has(Book::factory(rand(1, 10)))
                ->create([
                    'email' => $devEmail,
                    'is_admin' => true,
                ]);
        }
    }
}
