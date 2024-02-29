<?php

namespace App\Livewire\Auth;

use App\Models\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class Login extends Component
{
    #[Validate(['required', 'email'])]
    public string $email = '';

    #[Validate(['required', 'string'])]
    public string $password = '';

    #[Validate(['required', 'boolean'])]
    public bool $remember = false;

    public function fastLogin(): void
    {
        $author = Author::query()->first();
        $this->email = $author->email;
        $this->password = 'password';
        $this->submit();
    }

    public function submit(): void
    {
        $this->validate();

        if (Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            $this->redirectRoute('web.index');
        }

        $this->addError('email', 'Wrong credentials');
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
