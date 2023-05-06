<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;

class BooksTableSeeder extends BaseSeeder
{
    protected int $numItems = 10;

    public function run()
    {
        $data = $this->generateData(function () {

            $title = $this->faker->realText(40);
            ($book = new Book)->generateSlug();
            $slug = $book;

            return [
                'author_id' => User::inRandomOrder()->value('id'),
                'title' => $title,
                'slug' => $slug,
                'description' => $this->faker->realText(100)
            ];
        });

        $this->chunkedInsert(function (array $data) {
            Book::insert($data);
        }, $data);
    }
}
