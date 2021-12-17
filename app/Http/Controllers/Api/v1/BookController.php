<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Book;

// BookRequests
use App\Http\Requests\Api\v1\BookRequests\BookStoreRequest;
use App\Http\Requests\Api\v1\BookRequests\BookUpdateRequest;

// BookResources
use App\Http\Resources\Api\v1\BookResources\BookResource;
use App\Http\Resources\Api\v1\BookResources\BookWithAuthorNameResource;

use App\Http\Controllers\Controller;

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
                'books' => BookResource::collection($books),
            ],
            status: 200,
        );
    }

    public function booksWithAuthorName()
    {
        $books = Book::all();

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Список книг с именами авторов успешно получен.'),
                'books' => BookWithAuthorNameResource::collection($books),
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
    public function store(BookStoreRequest $request)
    {
        $validated = $request->validated();

        // TODO: check if admin
        if (!isset($validated['author_id'])) {
            $validated['author_id'] = (int) $request->user()->id;
        }

        $book = new Book($validated);
        $book->save();

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Книга успешно добавлена.'),
                'book' => new BookResource($book),
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
    public function show(int $bookId)
    {
        $book = Book::where('id', $bookId)->first();

        if ($book) {
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => __('Книга успешно получена.'),
                    'book' => new BookResource($book),
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
    public function update(BookUpdateRequest $request, int $bookId)
    {
        $book = Book::find($bookId);
        $validated = $request->validated();
        
        if ($book) {
            $this->authorize('update', [Book::class, $book]);

            $book->update($validated);
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => __('Книга успешно обновлена.'),
                    'book' => new BookResource($book),
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $bookId)
    {
        $book = Book::where('id', $bookId)->first();

        if ($book) {
            $this->authorize('delete', [Book::class, $book]);

            $book->delete();
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => __('Книга успешно удалена.'),
                    'book' => new BookResource($book),
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
