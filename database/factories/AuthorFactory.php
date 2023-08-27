<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    const PASSWORD = 'password';

    public function definition(): array
    {
        return [
            'email' => fake()->email(),
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'password' => self::PASSWORD,
            'is_admin' => fake()->boolean(),
            'birthday' => fake()->dateTime(),
        ];
    }
}
