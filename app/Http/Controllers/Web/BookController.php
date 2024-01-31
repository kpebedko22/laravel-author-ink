<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        return view('web.books.index', ['books' => Book::paginate()]);
    }

    public function show(Book $book): View
    {
        return view('web.books.show', ['book' => $book]);
    }
}
