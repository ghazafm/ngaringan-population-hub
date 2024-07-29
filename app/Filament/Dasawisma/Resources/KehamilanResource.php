<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\KehamilanResource\Pages;
use App\Filament\Dasawisma\Resources\KehamilanResource\RelationManagers;
use App\Models\Kehamilan;
use App\Models\Penduduk;
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

    protected static ?string $label = 'Kehamilan';

    protected static ?string $pluralLabel = 'Kehamilan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'Hamil' => 'Hamil',
                        'Melahirkan' => 'Melahirkan',
                        'Nifas' => 'Nifas',
                        'Meninggal' => 'Meninggal',
                    ]),
                Forms\Components\TextInput::make('nama_suami')
                    ->maxLength(100)
                    ->default(null),
                Forms\Components\Select::make('id_ibu')
                    ->required()
                    ->label('Nama ibu')
                    ->relationship('ibu', 'nama')
                    ->options(Penduduk::where('kelamin', 'Perempuan')->pluck('nama', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('nama_suami')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ibu.nama')
                    ->label('Nama ibu')
                    ->searchable()
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
            'index' => Pages\ListKehamilans::route('/'),
            'create' => Pages\CreateKehamilan::route('/create'),
            'view' => Pages\ViewKehamilan::route('/{record}'),
            'edit' => Pages\EditKehamilan::route('/{record}/edit'),
        ];
    }
}
