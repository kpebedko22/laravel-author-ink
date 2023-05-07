<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Books\BookRequest;
use App\Http\Requests\Admin\Books\BookUpsertRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(): View
    {
        return view('admin.books.index', ['books' => Book::all()]);
    }

    public function create(): View
    {
        return view('admin.books.create', [
            'model' => new Book(),
            'authors' => Author::pluck('name', 'id'),
        ]);
    }

    public function store(BookUpsertRequest $request): RedirectResponse
    {
        $book = Book::create($request->getData());

        return redirect()->route('admin.books.show', $book->id);
    }

    public function show(BookRequest $request): View
    {
        return view('admin.books.show', ['model' => $request->getBook()]);
    }

    public function edit(BookRequest $request): View
    {
        return view('admin.books.create', [
            'model' => $request->getBook(),
            'authors' => Author::pluck('name', 'id'),
        ]);
    }

    public function update(BookUpsertRequest $request): RedirectResponse
    {
        $book = $request->getBook();
        $book->update($request->getData());

        return redirect()->route('admin.books.show', $book->id);
    }

    public function destroy(BookRequest $request): RedirectResponse
    {
        $request->getBook()->delete();

        return redirect()->route('admin.books.index');
    }
}
