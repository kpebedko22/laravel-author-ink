<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\Books\BookDeleteRequest;
use App\Http\Requests\Api\v1\Books\BookRequest;
use App\Http\Requests\Api\v1\Books\BookUpsertRequest;
use App\Http\Resources\Api\v1\Books\BookCollection;
use App\Http\Resources\Api\v1\Books\BookResource;
use App\Repositories\BookRepository;
use App\Services\Api\v1\BookService;
use Illuminate\Http\JsonResponse;

class BookController extends BaseController
{
    public function __construct(protected BookService $service)
    {
    }

    public function index(): JsonResponse
    {
        return $this->successResponse(
            'book.index',
            (new BookCollection(
                BookResource::collection(BookRepository::index())
            ))->toArray(request())
        );
    }

    public function show(BookRequest $request): JsonResponse
    {
        return $this->successResponse(
            'book.show',
            (new BookResource(
                BookRepository::show($request->getBookId())
            ))->toArray($request)
        );
    }

    public function store(BookUpsertRequest $request): JsonResponse
    {
        $book = $this->service->store($request->getData());

        return $this->successResponse(
            'book.store',
            (new BookResource($book))->toArray($request)
        );
    }

    public function update(BookUpsertRequest $request): JsonResponse
    {
        $book = $this->service->update($request->getBook(), $request->getData());

        return $this->successResponse(
            'book.update',
            (new BookResource($book))->toArray($request)
        );
    }

    public function delete(BookDeleteRequest $request): JsonResponse
    {
        $this->service->delete($request->getBook());

        return $this->successResponse('book.delete');
    }
}
