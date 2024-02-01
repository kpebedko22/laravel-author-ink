<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    private const PASSWORD = 'password';

    public function definition(): array
    {
        return [
            'email' => fake()->email(),
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'password' => self::PASSWORD,
            'is_admin' => fake()->boolean(),
            'birthday' => fake()->dateTime(),
            'cover_color' => fake()->hexColor(),
        ];
    }
}
