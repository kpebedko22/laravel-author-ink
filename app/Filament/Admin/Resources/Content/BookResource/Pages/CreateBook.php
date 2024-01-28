<?php

namespace App\Filament\Admin\Resources\Content\BookResource\Pages;

use App\Filament\Admin\Resources\Content\BookResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBook extends CreateRecord
{
    protected static string $resource = BookResource::class;
}
