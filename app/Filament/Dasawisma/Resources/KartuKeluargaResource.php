<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\KartuKeluargaResource\Pages;
use App\Filament\Dasawisma\Resources\KartuKeluargaResource\RelationManagers;
use App\Filament\Dasawisma\Resources\KartuKeluargaResource\RelationManagers\AnggotaRelationManager;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KartuKeluargaResource extends Resource
{
    protected static ?string $model = KartuKeluarga::class;

    protected static ?string $label = 'Kartu Keluarga';

    protected static ?string $pluralLabel = 'Kartu Keluarga';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kependudukan';

    protected static ?int $navigationSort = 1; // Urutan teratas


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_kk')
                    ->label('Nomor Kartu Keluarga')
                    ->required(),
                Forms\Components\Select::make('kepala_keluarga')
                    ->label('Kepala Keluarga')
                    ->options(function ($get) {
                        $no_kk = $get('no_kk');
                        return Penduduk::where('no_kk', $no_kk)->pluck('nama', 'id');
                    })
                    ->searchable()
                    ->visible(fn ($livewire) => $livewire instanceof Pages\EditKartuKeluarga), // only visible on edit,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_kk')
                    ->label('No. Kartu Keluarga')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kepalaKeluarga.nama')
                    ->label('Kepala Keluarga')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc') // Mengurutkan berdasarkan kolom created_at secara menurun
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->requiresConfirmation(),
                ])
                ->label('Opsi Lain'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AnggotaRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKartuKeluargas::route('/'),
            'create' => Pages\CreateKartuKeluarga::route('/create'),
            'view' => Pages\ViewKartuKeluarga::route('/{record}'),
            'edit' => Pages\EditKartuKeluarga::route('/{record}/edit'),
        ];
    }
}
