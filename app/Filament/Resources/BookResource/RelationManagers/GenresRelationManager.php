<?php

namespace App\Filament\Resources\BookResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Kpebedko22\FilamentTranslation\FilamentTranslation;
use Kpebedko22\FilamentTranslation\Traits\Translatable;

class GenresRelationManager extends RelationManager
{
    use Translatable;

    protected static string $relationship = 'genres';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::trans([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\TextInput::make('order')
                    ->minValue(0)
                    ->maxValue(4294967295)
                    ->required(),
            ]));
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::trans([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('order'),
            ]))
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->form(function (Tables\Actions\AttachAction $action) {
                        return self::trans([
                            $action->getRecordSelect(),
                            Forms\Components\TextInput::make('order'),
                        ]);
                    })
                    ->modalWidth('xl'),
            ])
            ->reorderable('order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function translation(): FilamentTranslation
    {
        return FilamentTranslation::make(static::class, 'book.rel.genres');
    }
}
