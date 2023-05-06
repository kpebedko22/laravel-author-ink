<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends BaseSeeder
{
    protected int $numItems = 10;

    public function run()
    {
        $data = $this->generateData(function () {

            $name = $this->faker->realText(40);
//            ($book = new Book)->generateSlug();
//            $slug = $book;

            return [
                'name' => $name,
//                'slug' => $slug,
//                'description' => $this->faker->realText(100)
            ];
        });

        $this->chunkedInsert(function (array $data) {
            Genre::insert($data);
        }, $data);
    }
}
