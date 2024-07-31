<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\KehamilanResource\Pages;
use App\Filament\User\Resources\KehamilanResource\RelationManagers;
use App\Models\Kehamilan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KehamilanResource extends Resource
{
    protected static ?string $model = Kehamilan::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Fertility & Mortality';

    protected static ?string $label = 'Kehamilan';
    protected static ?string $pluralLabel = 'Kehamilan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('nama_suami')
                    ->maxLength(100)
                    ->default(null),
                Forms\Components\TextInput::make('id_ibu')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('nama_suami')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_ibu')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            //    // Tables\Actions\EditAction::make(),
            // ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
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
            'index' => Pages\ListKehamilans::route('/'),
           // 'create' => Pages\CreateKehamilan::route('/create'),
            'view' => Pages\ViewKehamilan::route('/{record}'),
           // 'edit' => Pages\EditKehamilan::route('/{record}/edit'),
        ];
    }
}
