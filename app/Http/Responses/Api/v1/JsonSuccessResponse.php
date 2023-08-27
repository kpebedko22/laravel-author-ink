<?php

namespace App\Http\Responses\Api\v1;

use Illuminate\Contracts\Support\Arrayable;

final class JsonSuccessResponse implements Arrayable
{
    private array $data;
    private string $message;

    public function __construct(string $message, array $data = [])
    {
        $this->data = $data;
        $this->message = $message;
    }

    public function toArray(): array
    {
        return array_merge(
            [
                'message' => $this->message,
            ],
            $this->data ? ['data' => $this->data] : [],
        );
    }

}
