<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\User;
use App\Packages\Enum\Examples\UserTypeEnum;
use App\Packages\Enum\Examples\WizardQuestionEnum;
use App\Providers\RouteServiceProvider;
use App\Services\Admin\Auth\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(protected AuthService $service)
    {
    }

    public function index(): View
    {
        $type = UserTypeEnum::findOrFail("1");

        $user = User::first();

//        UserTypeEnum::USUAL_USER;

        $user->type = $type;
        $user->save();

        dd(
            $user,
            $user->toArray(),
//            $type->toArray(),
            WizardQuestionEnum::all(),
            WizardQuestionEnum::selectOptions(),
//            WizardQuestionEnum::all()->toArray(),

//            $type->setLanguage('ru')->name,
//            $type->setLanguage('en')->name,
//            $type->id,
//
            UserTypeEnum::all(),
            UserTypeEnum::selectOptions(),
//            UserTypeEnum::selectOptions(),

        );

        return view('admin.auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
