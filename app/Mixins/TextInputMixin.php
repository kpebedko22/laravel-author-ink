<?php

namespace App\Mixins;

use Closure;
use Filament\Forms\Components\TextInput;

class TextInputMixin
{
    public function uInt32(): Closure
    {
        return function (): TextInput {
            /** @var TextInput $this */

            return $this->integer()
                ->minValue(0)
                ->maxValue(4294967295);
        };
    }
}
