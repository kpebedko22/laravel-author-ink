<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Admin>
 */
class AdminFactory extends Factory
{
    private const PASSWORD = 'password';

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'email' => fake()->unique()->email,
            'password' => self::PASSWORD,
        ];
    }
}
