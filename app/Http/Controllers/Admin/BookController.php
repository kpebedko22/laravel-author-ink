<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\Admin\BookRequests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create', ['book' => null, 'authors' => Author::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $bookId
     * @return \Illuminate\Http\Response
     */
    public function show($bookId)
    {
        $book = Book::find($bookId);
        if ($book)
            return view('books.show', ['book' => $book]);
        else
            return redirect()->route('admin.books.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($bookId)
    {
        $book = Book::find($bookId);

        if ($book)
            return view('books.create', ['book' => $book, 'authors' => Author::all()]);

        return redirect()->route('admin.books.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $bookId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookId)
    {
        $book = Book::find($bookId);
        if ($book)
            $book->delete();
        return redirect()->route('admin.books.index');
    }
}
