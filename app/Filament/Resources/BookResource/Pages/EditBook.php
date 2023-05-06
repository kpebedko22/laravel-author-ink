<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use App\Filament\Traits\HasEditPageConfig;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBook extends EditRecord
{
    use HasEditPageConfig;

    protected static string $resource = BookResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
