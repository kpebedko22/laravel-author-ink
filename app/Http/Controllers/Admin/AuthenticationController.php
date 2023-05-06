<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthenticationRequests\AuthenticationRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        if (Auth::check())
            return redirect()->route('admin.authentication.account');

        return view('authentication.sign-in');
    }

    public function signIn(AuthenticationRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {

            if (!Auth::user()->is_admin)
                return redirect()->route('admin.authentication.signOut');

            return redirect()->route('admin.authentication.account');
        }

        return redirect()->back()->withErrors([
            'credentials' => __('The provided credentials do not match.'),
        ]);
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('admin.authentication.index');
    }

    public function account()
    {
        return view('authentication.account', ['username' => Auth::user()->username,]);
    }
}
