<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const SEEDERS = [
        BooksTableSeeder::class => 'Books are created!',
    ];

    public function run(): void
    {
        foreach (self::SEEDERS as $seeder => $message) {
            $this->call($seeder);
            $this->command->info($message);
        }
    }
}
