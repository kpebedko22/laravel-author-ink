<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Component::macro('notify', function ($message) {
            /** @var Component $this */

            $this->dispatch('notify', $message);
        });
    }
}
