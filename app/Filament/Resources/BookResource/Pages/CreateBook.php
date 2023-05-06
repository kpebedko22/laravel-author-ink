<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use App\Filament\Traits\HasCreatePageConfig;
use Filament\Resources\Pages\CreateRecord;

class CreateBook extends CreateRecord
{
    use HasCreatePageConfig;

    protected static string $resource = BookResource::class;
}
