<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->realText(30),
            'author_id' => Author::factory(),
            'year' => fake()->year(),
            'genre' => fake()->realText(15),
        ];
    }
}
