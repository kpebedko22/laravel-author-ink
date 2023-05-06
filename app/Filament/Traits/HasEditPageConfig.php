<?php

namespace App\Filament\Traits;

use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\ForceDeleteAction;
use Filament\Pages\Actions\RestoreAction;
use Kpebedko22\FilamentTranslation\Traits\TranslatableEditRecordPage;

trait HasEditPageConfig
{
    use TranslatableEditRecordPage;

    protected function getPageActionsGroup(): array
    {
        $route = $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);

        return [
            DeleteAction::make()
                ->successRedirectUrl($route),

            RestoreAction::make()
                ->successRedirectUrl($route),

            ForceDeleteAction::make(),
        ];
    }
}
