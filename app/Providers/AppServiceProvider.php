<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Relation::requireMorphMap();
        Relation::morphMap([
            'author' => Author::class,
            'book' => Book::class,
            'admin' => Admin::class,
        ]);

        Component::macro('notify', function ($message) {
            /** @var Component $this */

            $this->dispatch('notify', $message);
        });
    }
}
