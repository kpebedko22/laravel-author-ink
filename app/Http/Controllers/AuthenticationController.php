<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\v1\AuthenticationRequests\AuthenticationSignUpRequest;
use App\Http\Requests\Api\v1\AuthenticationRequests\AuthenticationSignInRequest;
use App\Http\Requests\Api\v1\AuthenticationRequests\AuthenticationSignOutRequest;

use App\Models\Author;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function signUp(AuthenticationSignUpRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        $newAuthor = Author::create($validated);

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Успешно зарегистрирован.'),
                'author' => $newAuthor,
            ],
            status: 200,
        );
    }

    public function signIn(AuthenticationSignInRequest $request)
    {
        $validated = $request->validated();

        $author = Author::where('email', $validated['email'])->first();
        
        if (!$author || !Hash::check($validated['password'], $author->password)) {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => __('Вход не выполнен.'),
                ],
                status: 200,
            );
        }

        $token = $author->createToken('API Token')->plainTextToken;

        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Вход успешно выполнен.'),
                'accessToken' => $token,
            ],
            status: 200,
        );
    }

    public function signOut(AuthenticationSignOutRequest $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(
            data: [
                'error' => 0,
                'message' => __('Выход успешно выполнен.'),
            ],
            status: 200,
        );
    }
}
