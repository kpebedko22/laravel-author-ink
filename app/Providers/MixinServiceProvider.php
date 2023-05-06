<?php

namespace App\Providers;

use App\Mixins\TableActionMixin;
use App\Mixins\TextInputMixin;

//use App\Mixins\ViewComponentMixin;
use Filament\Forms\Components\TextInput;
use Filament\Support\Components\ViewComponent;
use Filament\Support\Actions\Action;
use Illuminate\Support\ServiceProvider;

class MixinServiceProvider extends ServiceProvider
{
    protected array $mixins = [
//        ViewComponent::class => ViewComponentMixin::class,
        TextInput::class => TextInputMixin::class,
        Action::class => TableActionMixin::class,
    ];

    public function boot()
    {
        foreach ($this->mixins as $class => $mixin) {
            $class::mixin(new $mixin);
        }
    }
}
