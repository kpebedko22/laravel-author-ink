<?php

namespace App\Http\Middleware;

use App\Managers\Web\LocaleManager;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = LocaleManager::getSession() ??
            $request->get('locale') ??
            $request->cookie(LocaleManager::COOKIE_KEY) ??
            $this->getBrowserLocale($request) ??
            LocaleManager::getDefaultLocale();

        $locale = LocaleManager::checkLocale($locale);

        app()->setLocale($locale);

        return $next($request);
    }

    private function getBrowserLocale(Request $request): ?string
    {
        $userLanguages = preg_split('/[,;]/', $request->server('HTTP_ACCEPT_LANGUAGE'));

        foreach ($userLanguages as $locale) {
            if (LocaleManager::isAvailable($locale)) {
                return $locale;
            }
        }

        return null;
    }
}
