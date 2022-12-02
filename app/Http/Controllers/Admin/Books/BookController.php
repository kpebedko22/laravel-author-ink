<?php

namespace App\Http\Controllers\Admin\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequests\BookRequest;
use App\Http\Requests\Admin\Books\BookIndexRequest;
use App\Http\Requests\Admin\Books\BookStoreRequest;
use App\Http\Requests\Admin\Books\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function __construct()
    {
    }

    public function index(BookIndexRequest $request): View
    {
        return view('admin.books.index', [
            'items' => Book::withTrashed()->paginate(3)
        ]);
    }

    public function create(): View
    {
        return view('admin.books.create');
    }

    public function store(BookStoreRequest $request)
    {
        //
    }

    public function show(BookRequest $request)
    {
        //
    }

    public function edit(BookRequest $request)
    {
        //
    }

    public function update(BookUpdateRequest $request)
    {
        //
    }

    public function destroy(BookRequest $request)
    {
        //
    }
}
