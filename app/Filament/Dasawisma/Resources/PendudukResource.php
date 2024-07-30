<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\PendudukResource\Pages;
use App\Filament\Dasawisma\Resources\PendudukResource\RelationManagers;
use App\Models\Penduduk;
use App\Models\Rumah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendudukResource extends Resource
{
    protected static ?string $model = Penduduk::class;

    protected static ?string $label = 'Penduduk';

    protected static ?string $pluralLabel = 'Penduduk';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kependudukan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_reg')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('no_kk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('status_perkawinan')
                    ->options([
                        'tidak kawin' => 'Tidak Kawin',
                        'kawin' => 'Kawin',
                    ])
                    ->native(false),
                Forms\Components\Select::make('kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
                    ])
                    ->native(false),
                Forms\Components\Select::make('pendidikan')
                    ->options([
                        'tidak sekolah' => 'Tidak Sekolah',
                        'sd' => 'SD',
                        'smp' => 'SMP',
                        'sma' => 'SMA',
                        'd1' => 'D1',
                        'd2' => 'D2',
                        'd3' => 'D3',
                        's1' => 'S1',
                        's2' => 'S2',
                        's3' => 'S3',
                        'lainnya' => 'Lainnya'
                    ])
                    ->native(false),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\Select::make('status_dalam_keluarga')
                    ->options([
                        'suami' => 'Suami',
                        'istri' => 'Istri',
                        'anak' => 'Anak',
                        'menantu keluarga' => 'Menantu Keluarga',
                        'lainnya' => 'Lainnya',
                    ])
                    ->native(false),
                Forms\Components\TextInput::make('pekerjaan')
                    ->maxLength(100)
                    ->default(null),
                Forms\Components\Toggle::make('Penerima Bantuan Iuran')
                    ->required(),
                Forms\Components\Select::make('keterangan')
                    ->required()
                    ->options([
                        'penduduk' => 'Penduduk',
                        'pindah' => 'Pindah',
                        'meninggal' => 'Meninggal',
                    ])
                    ->native(false),
                Forms\Components\Select::make('id_rumah')
                    ->required()
                    ->relationship('rumah', 'id_rumah')
                    ->options(Rumah::all()->pluck('id_rumah'))
                    ->searchable()
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_reg')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_perkawinan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelamin'),
                Tables\Columns\TextColumn::make('pendidikan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_dalam_keluarga')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pekerjaan')
                    ->searchable(),
                Tables\Columns\IconColumn::make('pbi')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_rumah')
                    ->numeric()
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
                Tables\Columns\TextColumn::make('rumah.dasawisma')
                    ->label('Dasawisma'),
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
            'index' => Pages\ListPenduduks::route('/'),
            'create' => Pages\CreatePenduduk::route('/create'),
            'view' => Pages\ViewPenduduk::route('/{record}'),
            'edit' => Pages\EditPenduduk::route('/{record}/edit'),
        ];
    }
}
