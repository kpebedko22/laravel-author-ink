<?php

namespace App\Managers\Web;

use Illuminate\Support\Facades\Session;

final class NotificationSessionManager
{
    const SUCCESS = 'success';
    const ERROR = 'error';

    public static function success(string $message): void
    {
        Session::flash(self::SUCCESS, $message);
    }

    public static function error(string $message): void
    {
        Session::flash(self::ERROR, $message);
    }
}
