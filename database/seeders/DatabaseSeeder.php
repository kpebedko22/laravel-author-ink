<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Book;
use App\Models\Follower;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createDevAdmin();

        // Создать авторов и у каждого автора можно указать создание книг
        $authors = collect(range(0, 69))
            ->map(function () {
                return Author::factory()
                    ->has(Book::factory(rand(1, 20)), 'books')
                    ->create();
            });

        // Есть список авторов. Для каждого автора надо создать список фолловеров
        // Запись фолловера надо создать используя автора и указать
        $authors->each(function (Author $follower) use ($authors) {
            $others = $authors->where('id', '!=', $follower->id);
            $count = random_int(0, $others->count());
            $others
                ->shuffle()
                ->take($count)
                ->each(function (Author $following) use ($follower) {
                    Follower::factory(1)
                        ->for($follower, 'follower')
                        ->for($following, 'following')
                        ->create();
                });
        });
    }

    private function createDevAdmin(): void
    {
        $devEmail = config('app.developer_email');

        if ($devEmail && Admin::where(['email' => $devEmail])->doesntExist()) {
            Admin::factory()
                ->create([
                    'name' => 'Admin',
                    'email' => $devEmail,
                ]);
        }
    }
}
