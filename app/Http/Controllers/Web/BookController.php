<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        return view('web.books.index');
    }

    public function show()
    {

    }
}
