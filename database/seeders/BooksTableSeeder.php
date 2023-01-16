<?php

namespace Database\Seeders;

use App\Models\Book;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BooksTableSeeder extends BaseSeeder
{
    protected int $numItems = 10;

    public function run()
    {
        $data = $this->generateData(function () {

            $title = $this->faker->realText(40);
            $slug = SlugService::createSlug(Book::class, 'slug', $title);

            return [
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
