<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Responses\Api\v1\JsonSuccessResponse;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected function successResponse(string $messageKey, array $data = []): JsonResponse
    {
        return response()->json(new JsonSuccessResponse(
            __("api/v1/response/$messageKey"),
            $data
        ));
    }
}
