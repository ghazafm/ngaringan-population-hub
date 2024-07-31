<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\KehamilanResource\Pages;
use App\Filament\Dasawisma\Resources\KehamilanResource\RelationManagers;
use App\Models\Kehamilan;
use App\Models\Penduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
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

    protected static ?string $navigationGroup = 'Kelahiran & Kematian';

    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'hamil' => 'Hamil',
                        'melahirkan' => 'Melahirkan',
                        'nifas' => 'Nifas',
                        'meninggal' => 'Meninggal',
                    ])
                    ->native(false),
                Forms\Components\TextInput::make('nama_suami')
                    ->label('Nama Suami')
                    ->maxLength(100)
                    ->default(null),
                Forms\Components\Select::make('id_ibu')
                    ->required()
                    ->label('Nama Ibu')
                    ->relationship('ibu', 'nama')
                    ->options(Penduduk::where('kelamin', 'Perempuan')->pluck('nama', 'id'))
                    ->searchable()
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('nama_suami')
                    ->label('Nama Suami')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ibu.nama')
                    ->label('Nama Ibu')
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
            ->defaultSort('created_at', 'desc') // Mengurutkan berdasarkan kolom created_at secara menurun
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
                ])
                ->label('Opsi Lain'),
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
