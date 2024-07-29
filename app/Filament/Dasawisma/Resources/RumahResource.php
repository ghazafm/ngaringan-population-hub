<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\RumahResource\Pages;
use App\Filament\Dasawisma\Resources\RumahResource\RelationManagers;
use App\Models\Rumah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RumahResource extends Resource
{
    protected static ?string $model = Rumah::class;

    protected static ?string $label = 'Rumah';

    protected static ?string $pluralLabel = 'Rumah';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rt')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('rw')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dasawisma')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('dusun')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('desa')
                    ->required()
                    ->maxLength(100)
                    ->default('ngaringan'),
                Forms\Components\TextInput::make('kecamatan')
                    ->required()
                    ->maxLength(100)
                    ->default('gandusari'),
                Forms\Components\TextInput::make('kabupaten')
                    ->required()
                    ->maxLength(100)
                    ->default('blitar'),
                Forms\Components\TextInput::make('provinsi')
                    ->required()
                    ->maxLength(100)
                    ->default('jawa timur'),
                Forms\Components\TextInput::make('balita')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('pus')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('wus')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('tiga_buta')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('ibu_hamil')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('ibu_menyusui')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('lansia')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('makanan_pokok'),
                Forms\Components\Toggle::make('jamban'),
                Forms\Components\TextInput::make('sumber_air'),
                Forms\Components\Toggle::make('pembuangan_sampah'),
                Forms\Components\Toggle::make('saluran_air_limbah'),
                Forms\Components\Toggle::make('stiker_p4k'),
                Forms\Components\TextInput::make('kriteria_rumah'),
                Forms\Components\Toggle::make('aktifitas_up2k'),
                Forms\Components\Toggle::make('kegiatan_lingkungan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rt')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rw')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dasawisma')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dusun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kabupaten')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provinsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('balita')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pus')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wus')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tiga_buta')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ibu_hamil')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ibu_menyusui')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lansia')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('makanan_pokok'),
                Tables\Columns\IconColumn::make('jamban')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sumber_air'),
                Tables\Columns\IconColumn::make('pembuangan_sampah')
                    ->boolean(),
                Tables\Columns\IconColumn::make('saluran_air_limbah')
                    ->boolean(),
                Tables\Columns\IconColumn::make('stiker_p4k')
                    ->boolean(),
                Tables\Columns\TextColumn::make('kriteria_rumah'),
                Tables\Columns\IconColumn::make('aktifitas_up2k')
                    ->boolean(),
                Tables\Columns\IconColumn::make('kegiatan_lingkungan')
                    ->boolean(),
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
                    Tables\Actions\DeleteBulkAction::make()->requiresConfirmation(),
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
            'index' => Pages\ListRumahs::route('/'),
            'create' => Pages\CreateRumah::route('/create'),
            'view' => Pages\ViewRumah::route('/{record}'),
            'view-penduduk' => Pages\ViewPendudukRumah::route('/{record}/penduduk'),
            'edit' => Pages\EditRumah::route('/{record}/edit'),
        ];
    }
}
