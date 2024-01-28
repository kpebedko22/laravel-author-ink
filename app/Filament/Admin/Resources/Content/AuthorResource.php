<?php

namespace App\Filament\Admin\Resources\Content;

use App\Filament\Admin\Resources\Content\AuthorResource\Pages;
use App\Filament\Admin\Resources\Content\AuthorResource\RelationManagers;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\Section::make()
                    ->columnSpan(['lg' => fn(?Author $record) => $record === null ? 3 : 2])
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->required(),

                        Forms\Components\TextInput::make('email')
                            ->maxLength(255)
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->email(),

                        Forms\Components\TextInput::make('username')
                            ->maxLength(255)
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\DatePicker::make('birthday')
                            ->required(),

                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required(static fn(?Author $record) => $record === null)
                            ->autocomplete('new-password')
                            ->revealable(),
                    ]),

                Forms\Components\Section::make()
                    ->columnSpan(['lg' => 1])
                    ->hidden(static fn(?Author $record) => $record === null)
                    ->schema([
                        Forms\Components\Placeholder::make('id')
                            ->content(static function (Author $record) {
                                return $record->id;
                            }),

                        Forms\Components\Placeholder::make('created_at')
                            ->content(static function (Author $record) {
                                return $record->created_at->format('d.m.Y H:i:s');
                            }),

                        Forms\Components\Placeholder::make('updated_at')
                            ->content(static function (Author $record) {
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
                    ->searchable(),

                Tables\Columns\TextColumn::make('books_count')
                    ->counts('books')
                    ->sortable(),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }
}
