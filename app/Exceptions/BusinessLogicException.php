<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class BusinessLogicException extends Exception
{
    protected ?array $debug = [];

    public function __construct($message = "", array $debug = [], $code = 0, Throwable $previous = null)
    {
        $this->debug = $debug;
        parent::__construct($message, $code, $previous);
    }

    public function getDebug(): array
    {
        return $this->debug;
    }
}
