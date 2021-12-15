<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\v1\AuthorResources\AuthorResource;
use App\Http\Resources\Api\v1\AuthorResources\AuthorWithBooksResource;
use App\Http\Resources\Api\v1\AuthorResources\AuthorWithBooksCountResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Список авторов успешно получен.'),
                'authors' => AuthorResource::collection($authors),
            ],
            status: 200,
        );
    }

    public function authorsWithBooks(){
        $authors = Author::all();

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Список авторов с книгами успешно получен.'),
                'authors' => AuthorWithBooksResource::collection($authors),
            ],
            status: 200,
        );
    }

    public function authorsWithBooksCount(){
        $authors = Author::all();

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Список авторов с количеством книг успешно получен.'),
                'authors' => AuthorWithBooksCountResource::collection($authors),
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
