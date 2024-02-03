<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        return view('web.authors.index', [
            'authors' => Author::query()->paginate(),
        ]);
    }

    public function show(Author $author): View
    {
        $author->loadCount(['books', 'followers', 'followings']);

        return view('web.authors.show', [
            'author' => $author,
            'topBooks' => $author->books()->limit(3)->get(),
        ]);
    }
}
