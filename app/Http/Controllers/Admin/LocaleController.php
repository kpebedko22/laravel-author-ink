<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Language\LocaleRequest;
use App\Managers\Admin\LocaleManager;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class LocaleController extends Controller
{
    public function store(LocaleRequest $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $locale = $request->getLang();

        LocaleManager::storeSession($locale);
        LocaleManager::storeCookie($locale);

        return redirect(request()->header('Referer'));
    }
}
