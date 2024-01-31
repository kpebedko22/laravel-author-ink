<?php

namespace App\Managers\Web;

final class LocaleManager
{
    const SESSION_KEY = 'locale';

    const COOKIE_KEY = 'admin-locale';

    public static function getAvailableLocales(): array
    {
        return ['ru', 'en'];
    }

    public static function storeSession(string $locale): void
    {
        $locale = self::checkLocale($locale);

        session()->put(self::SESSION_KEY, $locale);
    }

    public static function storeCookie(string $locale): void
    {
        $locale = self::checkLocale($locale);

        cookie()->queue(cookie()->forever(self::COOKIE_KEY, $locale));
    }

    public static function checkLocale(string $locale): string
    {
        return self::isAvailable($locale)
            ? $locale
            : self::getDefaultLocale();
    }

    public static function isAvailable(string $locale): bool
    {
        return in_array($locale, self::getAvailableLocales());
    }

    public static function getDefaultLocale(): string
    {
        return config('app.locale', 'en');
    }

    public static function getSession(): ?string
    {
        return session(self::SESSION_KEY);
    }

    public static function getCurrent(): string
    {
        return app()->getLocale();
    }
}
