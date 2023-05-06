<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends BaseSeeder
{
    protected int $numItems = 10;

    public function run(): void
    {
        $password = Hash::make('password');

        $data = $this->generateData(function () use ($password) {
            return [
                'type' => $this->faker->randomElement([1, 2, 3]),
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'password' => $password
            ];
        });

        $this->chunkedInsert(function (array $data) {
            User::insert($data);
        }, $data);
    }
}
