<?php

namespace App\Mixins;

use Closure;
use Filament\Support\Actions\Action;

class TableActionMixin
{
    public function likeAttach(): Closure
    {
        return function (): Action {
            /** @var Action $this */

            $this->modalButton(__('filament-support::actions/attach.single.modal.actions.attach.label'))
                ->label(__('filament-support::actions/attach.single.label'))
                ->successNotificationTitle(__('filament-support::actions/attach.single.messages.attached'))
                ->color('secondary')
                ->modalButton(__('filament-support::actions/attach.single.modal.actions.attach.label'));

            return $this;
        };
    }

    public function likeDetach(): Closure
    {
        return function (): Action {
            /** @var Action $this */

            $this->label(__('filament-support::actions/detach.single.label'))
                ->successNotificationTitle(__('filament-support::actions/detach.single.messages.detached'))
                ->icon('heroicon-s-x');

            return $this;
        };
    }

    public function likeBulkDetach(): Closure
    {
        return function (): Action {

            /** @var Action $this */

            $this->label(__('filament-support::actions/detach.multiple.label'))
                ->successNotificationTitle(__('filament-support::actions/delete.multiple.messages.deleted'))
                ->icon('heroicon-s-x');

            return $this;
        };
    }
}
