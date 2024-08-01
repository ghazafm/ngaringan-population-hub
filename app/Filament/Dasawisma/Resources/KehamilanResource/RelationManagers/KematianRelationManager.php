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

class KematianRelationManager extends RelationManager
{
    protected static string $relationship = 'kematian';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('status')
                ->required()
                ->options([
                    'Ibu' => 'Ibu',
                    'Anak' => 'Anak',
                ])
                ->native(false),
            Forms\Components\TextInput::make('nama')
                ->required()
                ->maxLength(100),
            Forms\Components\Select::make('kelamin')
                ->required()
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ])
                ->native(false),
            Forms\Components\DatePicker::make('tanggal')
                ->required(),
            Forms\Components\TextInput::make('sebab')
                ->maxLength(255)
                ->default(null),
            Forms\Components\TextInput::make('keterangan')
                ->maxLength(255)
                ->default(null),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('kehamilan.ibu.nama')
                    ->label('Nama Ibu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kelamin')
                    ->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sebab')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\DeleteAction::make()->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->requiresConfirmation(),
                ])
                ->label('Opsi Lain'),
            ]);
    }
}
