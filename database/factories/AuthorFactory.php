<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->email(),
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'password' => 'password',
            'is_admin' => $this->faker->boolean(),
            'birthday' => $this->faker->dateTime(),
        ];
    }
}
