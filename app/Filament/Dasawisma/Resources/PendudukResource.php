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
                        'Tidak Kawin' => 'Tidak Kawin',
                        'Kawin' => 'Kawin',
                    ]),
                Forms\Components\Select::make('kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ]),
                Forms\Components\Select::make('pendidikan')
                    ->options([
                        'Tidak Sekolah' => 'Tidak Sekolah',
                        'SD' => 'SD',
                        'SMP' => 'SMP',
                        'SMA' => 'SMA',
                        'D1' => 'D1',
                        'D2' => 'D2',
                        'D3' => 'D3',
                        'S1' => 'S1',
                        'S2' => 'S2',
                        'S3' => 'S3',
                        'Lainnya' => 'Lainnya'
                    ]),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\Select::make('status_dalam_keluarga')
                    ->options([
                        'Suami' => 'Suami',
                        'Istri' => 'Istri',
                        'Anak' => 'Anak',
                        'Menantu Keluarga' => 'Menantu Keluarga',
                        'Lainnya' => 'Lainnya',
                    ]),
                Forms\Components\TextInput::make('pekerjaan')
                    ->maxLength(100)
                    ->default(null),
                Forms\Components\Toggle::make('Penerima Bantuan Iuran')
                    ->required(),
                Forms\Components\Select::make('keterangan')
                    ->required()
                    ->options([
                        'Penduduk' => 'Penduduk',
                        'Pindah' => 'Pindah',
                        'Meninggal' => 'Meninggal',
                    ]),
                Forms\Components\Select::make('id_rumah')
                    ->required()
                    ->relationship('rumah', 'id_rumah')
                    ->options(Rumah::all()->pluck('id_rumah'))
                    ->searchable(),
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
            'index' => Pages\ListPenduduks::route('/'),
            'create' => Pages\CreatePenduduk::route('/create'),
            'view' => Pages\ViewPenduduk::route('/{record}'),
            'edit' => Pages\EditPenduduk::route('/{record}/edit'),
        ];
    }
}
