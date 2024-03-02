<?php

namespace App\DTOs\Web\Authors;

use Illuminate\Support\Arr;
use Livewire\Wireable;

final class AuthorFollowerDTO implements Wireable
{
    public function __construct(
        public readonly int    $id,
        public readonly string $name,
        public readonly string $username,
    ) {
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
        ];
    }

    public static function fromLivewire($value): AuthorFollowerDTO
    {
        return new AuthorFollowerDTO(
            Arr::get($value, 'id'),
            Arr::get($value, 'name'),
            Arr::get($value, 'username'),
        );
    }
}
