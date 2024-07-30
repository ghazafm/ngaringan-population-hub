<?php

namespace App\Filament\Dasawisma\Resources\KartuKeluargaResource\RelationManagers;

use App\Models\Rumah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggotaRelationManager extends RelationManager
{
    protected static string $relationship = 'anggota';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_reg')
                    ->maxLength(255)
                    ->default(null),
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
                    Forms\Components\Toggle::make('Penerima Bantuan Iuran')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('status_dalam_keluarga'),
                Tables\Columns\TextColumn::make('kelamin'),
                Tables\Columns\TextColumn::make('status_perkawinan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
