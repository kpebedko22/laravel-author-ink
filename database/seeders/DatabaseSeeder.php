<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
//        Author::create([
//            'email' => 'admin@admin',
//            'password' => 'password',
//        ]);
        Author::factory(10)->create();

//        $this->call(AuthorsSeeder::class);
//        $this->call(BooksSeeder::class);
    }
}
