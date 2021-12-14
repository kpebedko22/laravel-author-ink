<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Список книг успешно получен.'),
                'books' => $books,
            ],
            status: 200,
        );
    }

    public function booksWithAuthorName()
    {
        $books = Book::select(
            'books.id',
            'books.name',
            'books.genre',
            'books.year',
            'authors.name as authorName',
        )
            ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
            ->get();

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Список книг с именами авторов успешно получен.'),
                'books' => $books,
            ],
            status: 200,
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $validated = $request->validated();

        if (!isset($validated['author_id'])) {
            $validated['author_id'] = (int) $request->user()->id;
        }

        $book = new Book($validated);
        $book->save();

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Книга успешно добавлена.'),
                'book' => $book,
            ],
            status: 200,
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('id', $id)->first();

        if ($book) {
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => __('Книга успешно получена.'),
                    'book' => $book,
                ],
                status: 200,
            );
        } else {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => __('Книга не найдена.'),
                ],
                status: 404,
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => __('Книга успешно удалена.'),
                    'book' => $book,
                ],
                status: 200,
            );
        } else {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => __('Книга не найдена.'),
                ],
                status: 404,
            );
        }
    }
}
