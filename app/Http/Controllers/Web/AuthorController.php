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
}
