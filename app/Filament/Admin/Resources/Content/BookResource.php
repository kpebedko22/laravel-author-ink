<?php

namespace App\Filament\Admin\Resources\Content;

use App\Filament\Admin\Resources\Content\BookResource\Pages;
use App\Filament\Admin\Resources\Content\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\Section::make()
                    ->columnSpan(['lg' => fn(?Book $record) => $record === null ? 3 : 2])
                    ->schema([
                        Forms\Components\Select::make('author_id')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->required(),

                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->required(),

                        Forms\Components\TextInput::make('genre')
                            ->maxLength(255)
                            ->required(),

                        Forms\Components\Select::make('year')
                            ->searchable()
                            ->options(static function () {
                                $values = array_reverse(range(1900, now()->year));

                                return array_combine($values, $values);
                            })
                            ->required(),
                    ]),

                Forms\Components\Section::make()
                    ->columnSpan(['lg' => 1])
                    ->hidden(static fn(?Book $record) => $record === null)
                    ->schema([
                        Forms\Components\Placeholder::make('id')
                            ->content(static function (Book $record) {
                                return $record->id;
                            }),

                        Forms\Components\Placeholder::make('created_at')
                            ->content(static function (Book $record) {
                                return $record->created_at->format('d.m.Y H:i:s');
                            }),

                        Forms\Components\Placeholder::make('updated_at')
                            ->content(static function (Book $record) {
                                return $record->updated_at->format('d.m.Y H:i:s');
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('author.name')
                    ->sortable()
                    ->searchable()
                    ->limit(30),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('author')
                    ->relationship('author', 'name')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
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
