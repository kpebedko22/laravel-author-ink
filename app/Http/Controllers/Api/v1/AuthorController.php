<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\Authors\AuthorRequest;
use App\Http\Resources\Api\v1\Authors\AuthorCollection;
use App\Http\Resources\Api\v1\Authors\AuthorResource;
use App\Repositories\AuthorRepository;
use Illuminate\Http\JsonResponse;

class AuthorController extends BaseController
{
    public function index(): JsonResponse
    {
        return $this->successResponse(
            'author.index',
            (new AuthorCollection(
                AuthorResource::collection(AuthorRepository::index())
            ))->toArray(request())
        );
    }

    public function statistic(): JsonResponse
    {
        return $this->successResponse(
            'author.statistic',
            (new AuthorCollection(
                AuthorResource::collection(AuthorRepository::statistic())
            ))->toArray(request())
        );
    }

    public function show(AuthorRequest $request): JsonResponse
    {
        return $this->successResponse(
            'author.show',
            (new AuthorResource(
                AuthorRepository::show($request->getAuthorId())
            ))->toArray($request)
        );
    }
}
