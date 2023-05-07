<?php

namespace App\Http\Requests\Admin\Authors;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function getAuthor(): Author
    {
        return Author::findOrFail($this->route('author_id'));
    }
}
