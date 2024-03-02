<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Follower;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Follower>
 */
class FollowerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'follower_id' => Author::factory(),
            'following_id' => Author::factory(),
        ];
    }
}
