<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\RumahResource\Pages;
use App\Filament\Dasawisma\Resources\RumahResource\RelationManagers;
use App\Filament\Dasawisma\Resources\RumahResource\RelationManagers\PendudukRelationManager;
use App\Models\Rumah;
use App\Models\Penduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
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

    protected static ?string $navigationGroup = 'Kependudukan';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kepala_rumah_tangga')
                    ->label('Kepala Rumah Tangga')
                    ->relationship('penduduk', 'nama')
                    ->reactive()
                    ->options(function ($get) {
                        $id_rumah = $get('id_rumah');
                        return Penduduk::where('id_rumah', $id_rumah)->pluck('nama', 'id');
                    })
                    ->searchable()
                    ->native(false),
                Forms\Components\TextInput::make('rt')
                    ->label('RT')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('rw')
                    ->label('RW')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dasawisma')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('dusun')
                    ->required()
                    ->options([
                        'ngaringan' => 'Ngaringan',
                        'gondoroso' => 'Gondoroso',
                        'purwosari' => 'Purwosari',
                        'bintang' => 'Bintang',
                    ])
                    ->native(false),
                Forms\Components\TextInput::make('balita')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('pus')
                    ->label('PUS')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('wus')
                    ->label('WUS')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('tiga_buta')
                    ->label('3 Buta')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('ibu_hamil')
                    ->label('Ibu Hamil')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('ibu_menyusui')
                    ->label('Ibu Menyusui')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('lansia')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Select::make('makanan_pokok')
                    ->label('Makanan Pokok')
                    ->required()
                    ->options([
                        'Beras' => 'Beras',
                        'Non Beras' => 'Non Beras',
                    ])
                    ->native(false),
                Forms\Components\Toggle::make('jamban'),
                Forms\Components\Select::make('sumber_air')
                    ->label('Sumber Air')
                    ->required()
                    ->options([
                        'pdam' => 'PDAM',
                        'sumur' => 'Sumur',
                        'sungai' => 'Sungai',
                        'lainnya' => 'Lainnya',
                    ])
                    ->native(false),
                Forms\Components\Toggle::make('pembuangan_sampah')
                    ->label('Pembuangan Sampah'),
                Forms\Components\Toggle::make('saluran_air_limbah')
                    ->label('Saluran Air Limbah'),
                Forms\Components\Toggle::make('stiker_p4k')
                    ->label('Stiker P4K'),
                Forms\Components\Select::make('kriteria_rumah')
                    ->label('Kriteria Rumah')
                    ->required()
                    ->options([
                        'sehat' => 'Sehat',
                        'kurang sehat' => 'Kurang Sehat',
                    ])
                    ->native(false),
                Forms\Components\Toggle::make('aktifitas_up2k')
                    ->label('Aktivitas UP2K'),
                Forms\Components\Toggle::make('kegiatan_lingkungan')
                    ->label('Kegiatan Lingkungan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_rumah')
                    ->label('ID Rumah')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('krt.nama')
                    ->label('Kepala Rumah Tangga')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rt')
                    ->label('RT')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rw')
                    ->label('RW')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dasawisma')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('dusun')
                    ->searchable()
                    ->sortable(),
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
                    ->label('PUS')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wus')
                    ->label('WUS')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tiga_buta')
                    ->label('3 Buta')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ibu_hamil')
                    ->label('Ibu Hamil')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ibu_menyusui')
                    ->label('Ibu Menyusui')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lansia')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('makanan_pokok')
                    ->label('Makanan Pokok')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('jamban')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sumber_air')
                    ->label('Sumber Air')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('pembuangan_sampah')
                    ->label('Pembuangan Sampah')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('saluran_air_limbah')
                    ->label('Saluran Air Limbah')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('stiker_p4k')
                    ->label('Stiker P4K')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kriteria_rumah')
                    ->label('Kriteria Rumah')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('aktifitas_up2k')
                    ->label('Aktivitas UP2K')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('kegiatan_lingkungan')
                    ->label('Kegiatan Lingkungan')
                    ->boolean()
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
                    Tables\Actions\DeleteBulkAction::make()->requiresConfirmation(),
                ])
                ->label('Opsi Lain'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PendudukRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRumahs::route('/'),
            'create' => Pages\CreateRumah::route('/create'),
            'view' => Pages\ViewRumah::route('/{record}'),
            'edit' => Pages\EditRumah::route('/{record}/edit'),
        ];
    }
}
