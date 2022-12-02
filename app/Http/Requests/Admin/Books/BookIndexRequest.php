<?php

namespace App\Http\Requests\Admin\Books;

use Illuminate\Foundation\Http\FormRequest;

class BookIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
