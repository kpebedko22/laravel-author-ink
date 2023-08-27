<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\AuthenticationRequests\LoginRequest;
use App\Http\Requests\Api\v1\AuthenticationRequests\RegisterRequest;
use App\Http\Responses\Api\v1\JsonErrorResponse;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $author = Author::create($request->getData());

        return $this->successResponse(
            'auth.register',
            ['author' => $author]
        );
    }

    public function login(LoginRequest $request): JsonResponse
    {
        // TODO: logic to service
        $credentials = $request->getCredentials();

        $author = Author::firstWhere('email', $credentials->getEmail());

        if (!$author ||
            !Hash::check($credentials->getPassword(), $author->password)
        ) {
            return response()->json(new JsonErrorResponse(
                __('Вход не выполнен.'),
            ));
        }

        $token = $author->createToken('API Token')->plainTextToken;

        return $this->successResponse(
            'auth.login',
            ['accessToken' => $token]
        );
    }

    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->successResponse(
            'auth.logout',
        );
    }
}
