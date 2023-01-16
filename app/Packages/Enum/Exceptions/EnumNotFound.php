<?php

namespace App\Packages\Enum\Exceptions;

use Exception;

class EnumNotFound extends Exception
{
    protected $code = 404;
}
