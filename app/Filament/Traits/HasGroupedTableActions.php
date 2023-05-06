<?php

namespace App\Filament\Traits;

use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;

trait HasGroupedTableActions
{

    protected static function getGroupedTableActions(): array
    {
        return [
            ActionGroup::make([
                EditAction::make(),
                RestoreAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
            ]),
        ];
    }

    protected static function getGroupedTableBulkActions(): array
    {
        return [
            RestoreBulkAction::make(),
            DeleteBulkAction::make(),
            ForceDeleteBulkAction::make(),
        ];
    }
}
