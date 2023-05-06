<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Filament\Traits\HasGroupedTableActions;
use App\Models\Book;
use App\Repositories\UserRepository;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Kpebedko22\FilamentTranslation\FilamentTranslation;
use Kpebedko22\FilamentTranslation\Traits\Translatable;
use Kpebedko22\FilamentTranslation\Traits\TranslatableResource;

class BookResource extends Resource
{
    use Translatable,
        TranslatableResource,
        HasGroupedTableActions;

    protected static ?string $model = Book::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function translation(): FilamentTranslation
    {
        return FilamentTranslation::make(static::class, 'book');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make(self::trans([

                    Forms\Components\TextInput::make('title')
                        ->required(),

                    Forms\Components\TextInput::make('slug')
                        ->hiddenOn(['create'])
                        ->required(),

                    Forms\Components\Textarea::make('description')
                        ->required(),
                ])),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::trans([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name'),
            ]))
            ->filters(self::trans([
                Tables\Filters\SelectFilter::make('author_id')
//                    ->searchable()
                    ->options(fn() => UserRepository::options())
            ]));
//            ->actions(static::getGroupedTableActions())
//            ->bulkActions(static::getGroupedTableBulkActions());
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\GenresRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
