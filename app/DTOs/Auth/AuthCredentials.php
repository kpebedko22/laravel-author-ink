<?php

namespace App\DTOs\Auth;

use Illuminate\Contracts\Support\Arrayable;

class AuthCredentials implements Arrayable
{
    public function __construct(
        protected string $email,
        protected string $password,
    )
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
