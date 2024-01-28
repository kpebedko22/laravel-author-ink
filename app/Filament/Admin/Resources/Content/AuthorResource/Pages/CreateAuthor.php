<?php

namespace App\Filament\Admin\Resources\Content\AuthorResource\Pages;

use App\Filament\Admin\Resources\Content\AuthorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
