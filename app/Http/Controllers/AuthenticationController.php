<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\AuthenticationSignUpRequest;
use App\Http\Requests\AuthenticationSignInRequest;
use Illuminate\Http\Request;
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

    public function signOut(AuthenticationRequest $request)
    {
        
    }
}
