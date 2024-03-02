<?php

namespace App\DTOs\Web\Pagination;

use Illuminate\Support\Collection;

final class PaginatedDTO
{
    public function __construct(
        public readonly Collection $items,
        public readonly bool       $hasMore,
    ) {
    }
}
