<?php

namespace App\Filament\Admin\Resources\Content\AuthorResource\Pages;

use App\Filament\Admin\Resources\Content\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuthor extends EditRecord
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
