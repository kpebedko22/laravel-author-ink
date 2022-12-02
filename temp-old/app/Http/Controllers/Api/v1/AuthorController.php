<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\Api\v1\AuthorResources\AuthorResource;
use App\Http\Resources\Api\v1\AuthorResources\AuthorWithBooksResource;
use App\Http\Resources\Api\v1\AuthorResources\AuthorWithBooksCountResource;
use App\Models\Author;
use App\Http\Requests\Api\v1\AuthorRequests\AuthorUpdateRequest;
use App\Http\Controllers\Controller;

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

    public function authorsWithBooks()
    {
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

    public function authorsWithBooksCount()
    {
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
     * Display the specified resource.
     *
     * @param  int  $authorId
     * @return \Illuminate\Http\Response
     */
    public function show(int $authorId)
    {
        $author = Author::find($authorId);
        if ($author)
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => __('Информация об авторе успешно получена.'),
                    'author' => new AuthorResource($author),
                ],
                status: 200,
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $authorId
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUpdateRequest $request, int $authorId)
    {
        $validated = $request->validated();

        $author = Author::find($authorId);

        if ($author)
            $author->update($validated);

        return response()->json(
            data : [
                'error' => 0,
                'message' => __('Информация успешно обновлена.'),
                'author' => new AuthorResource($author),
            ],
            status: 200,
        );
    }
}
