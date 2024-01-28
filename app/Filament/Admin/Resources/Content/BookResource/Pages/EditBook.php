<?php

namespace App\Filament\Admin\Resources\Content\BookResource\Pages;

use App\Filament\Admin\Resources\Content\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBook extends EditRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
