<?php

namespace App\Http\Requests\Admin\Authors;

class AuthorUpsertRequest extends AuthorRequest
{
    protected function isUpdate(): bool
    {
        return (bool)$this->route('author_id');
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_admin' => $this->has('is_admin'),
        ]);
    }

    public function rules(): array
    {
        $passwordRequired = $this->isUpdate()
            ? 'nullable'
            : 'required';

        return [
            'name' => ['required', 'string', 'max:255'],
            'password' => [$passwordRequired, 'string', 'min:6'],
            'birthday' => ['required', 'date'],
            'email' => [
                'required',
                'email',
                'unique:authors,email,' . $this->route('author_id'),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                'unique:authors,username,' . $this->route('author_id'),
            ],
            'is_admin' => ['required', 'bool'],
        ];
    }

    public function getData(): array
    {
        $validated = parent::validated();

        $unsetPassword = $this->isUpdate() && !$this->validated('password');

        if ($unsetPassword) {
            unset($validated['password']);
        }

        return $validated;
    }
}
