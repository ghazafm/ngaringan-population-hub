<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PendudukResource\Pages;
use App\Filament\User\Resources\PendudukResource\RelationManagers;
use App\Models\Penduduk;
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

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Pendataan';
    


    protected static ?string $label = 'Penduduk';
    protected static ?string $pluralLabel = 'Penduduk';

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
                Forms\Components\TextInput::make('status_perkawinan'),
                Forms\Components\TextInput::make('kelamin'),
                Forms\Components\TextInput::make('pendidikan'),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\TextInput::make('status_dalam_keluarga'),
                Forms\Components\TextInput::make('pekerjaan')
                    ->maxLength(100)
                    ->default(null),
                Forms\Components\Toggle::make('pbi')
                    ->required(),
                Forms\Components\TextInput::make('keterangan')
                    ->required(),
                Forms\Components\TextInput::make('id_rumah')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('status_perkawinan'),
                Tables\Columns\TextColumn::make('kelamin'),
                Tables\Columns\TextColumn::make('pendidikan'),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_dalam_keluarga'),
                Tables\Columns\TextColumn::make('pekerjaan')
                    ->searchable(),
                Tables\Columns\IconColumn::make('pbi')
                    ->boolean(),
                Tables\Columns\TextColumn::make('keterangan'),
                Tables\Columns\TextColumn::make('id_rumah')
                    ->numeric()
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
            //     Tables\Actions\EditAction::make(),
            // ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
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
            //'create' => Pages\CreatePenduduk::route('/create'),
            'view' => Pages\ViewPenduduk::route('/{record}'),
            //'edit' => Pages\EditPenduduk::route('/{record}/edit'),
        ];
    }
}
