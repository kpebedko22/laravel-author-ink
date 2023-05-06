<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use App\Filament\Traits\HasListPageConfig;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBooks extends ListRecords
{
    use HasListPageConfig;

    protected static string $resource = BookResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
