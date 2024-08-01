<?php

namespace App\Filament\Dasawisma\Resources;

use App\Filament\Dasawisma\Resources\KematianResource\Pages;
use App\Filament\Dasawisma\Resources\KematianResource\RelationManagers;
use App\Models\Kematian;
use App\Models\Kehamilan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KematianResource extends Resource
{
    protected static ?string $model = Kematian::class;

    protected static ?string $label = 'Kematian';

    protected static ?string $pluralLabel = 'Kematian';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kelahiran & Kematian';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_kehamilan')
                    ->label('Nama Ayah')
                    ->options(Kehamilan::pluck('nama_suami', 'id_kehamilan'))
                    ->searchable()
                    ->required()
                    ->reactive()
                    ->native(false),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'ibu' => 'Ibu',
                        'anak' => 'Anak',
                    ])
                    ->native(false),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('kelamin')
                    ->required()
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kehamilan.ibu.nama')
                    ->label('Nama Ibu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kehamilan.nama_suami')
                    ->label('Nama Ayah')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Bayi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kelamin')
                    ->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sebab')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKematians::route('/'),
            'create' => Pages\CreateKematian::route('/create'),
            'view' => Pages\ViewKematian::route('/{record}'),
            'edit' => Pages\EditKematian::route('/{record}/edit'),
        ];
    }
}
