<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\KelahiranResource\Pages;
use App\Filament\Dasawisma\Resources\KelahiranResource\RelationManagers;
use App\Models\Kehamilan;
use App\Models\Kelahiran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelahiranResource extends Resource
{
    protected static ?string $model = Kelahiran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_kehamilan')
                    ->required()
                    ->options(Kehamilan::pluck('id_kehamilan','id_kehamilan')),
                Forms\Components\TextInput::make('nama_bayi')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required(),
                Forms\Components\Toggle::make('akta_kelahiran')
                    ->required(),
                Forms\Components\TextInput::make('kelamin')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_kehamilan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_bayi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('akta_kelahiran')
                    ->boolean(),
                Tables\Columns\TextColumn::make('kelamin'),
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
            'index' => Pages\ListKelahirans::route('/'),
            'create' => Pages\CreateKelahiran::route('/create'),
            'view' => Pages\ViewKelahiran::route('/{record}'),
            'edit' => Pages\EditKelahiran::route('/{record}/edit'),
        ];
    }
}
