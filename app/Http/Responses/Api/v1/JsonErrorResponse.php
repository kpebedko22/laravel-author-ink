<?php

namespace App\Http\Responses\Api\v1;

use Illuminate\Contracts\Support\Arrayable;

final class JsonErrorResponse implements Arrayable
{
    private array $errors;
    private string $message;

    public function __construct(string $message, array $errors = [])
    {
        $this->errors = $errors;
        $this->message = $message;
    }

    public function toArray(): array
    {
        return array_merge(
            [
                'message' => $this->message,
            ],
            $this->errors ? ['errors' => $this->errors] : [],
        );
    }

}
