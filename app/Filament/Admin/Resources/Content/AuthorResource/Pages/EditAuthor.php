<?php

namespace App\Filament\Admin\Resources\Content\AuthorResource\Pages;

use App\Filament\Admin\Resources\Content\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Arr;

class EditAuthor extends EditRecord
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $password = Arr::get($data, 'password');

        if (!$password) {
            Arr::forget($data, 'password');
        }

        return $data;
    }
}
