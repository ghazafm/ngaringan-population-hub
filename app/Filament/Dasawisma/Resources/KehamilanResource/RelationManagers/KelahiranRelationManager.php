<?php

namespace App\Filament\Dasawisma\Resources\KehamilanResource\RelationManagers;

use App\Models\Kehamilan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelahiranRelationManager extends RelationManager
{
    protected static string $relationship = 'kelahiran';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama_bayi')
                ->required()
                ->maxLength(100),
            Forms\Components\DatePicker::make('tanggal_lahir')
                ->required(),
            Forms\Components\Toggle::make('akta_kelahiran')
                ->required(),
            Forms\Components\Select::make('kelamin')
                ->required()
                ->options([
                    'laki-laki' => 'Laki-laki',
                    'perempuan' => 'Perempuan',
                ])
                ->native(false),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_bayi')
            ->columns([
                Tables\Columns\TextColumn::make('kehamilan.ibu.nama')
                    ->label('Nama Ibu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_bayi')
                    ->label('Nama Bayi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('akta_kelahiran')
                    ->label('Akta Kelahiran')
                    ->boolean(),
                Tables\Columns\TextColumn::make('kelamin')
                    ->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc')
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
