<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.authentication.account');
        }
        return view('authentication.sign-in');
    }

    public function signIn(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $validated = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if (Auth::attempt($validated)) {
            return redirect()->route('admin.authentication.account');
        } else {
            return back()->withErrors('error', 'Wrong credentials.');
        }
    }

    public function signOut(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.authentication.index');
    }

    public function account(Request $request)
    {
        return view('authentication.account', ['username' => Auth::user()->username, ]);
    }
}
