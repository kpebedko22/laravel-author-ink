<?php

namespace App\Http\Requests\Api\v1\Authors;

use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function getAuthorId():int
    {
        return $this->route('author_id', 0);
    }

    public function getAuthor():Author
    {
        return AuthorRepository::getById($this->getAuthorId());
    }
}
