<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('usertype')
                    ->required()
                    ->options([
                        'user'=>'User',
                        'admin'=>'Admin',
                        'dasawisma'=>'Dasawisma'
                    ])
                    ,
                Forms\Components\Select::make('rt')
                    ->required()
                    ->options([
                        '1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                        '4'=>'4',
                        '5'=>'5'
                    ]),
                Forms\Components\Select::make('rw')
                    ->required()
                    ->options([
                        '1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                    ]),
                Forms\Components\Select::make('dusun')
                    ->required()
                    ->options([
                        'gondoroso' => 'gondoroso',
                        'purwosari' => 'purwosari',
                        'ngaringan' => 'ngaringan',
                        'bintang' => 'bintang',
                    ]
                    ),
                Forms\Components\TextInput::make('no_telp')
                    ->tel()
                    ->numeric()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('usertype'),
                Tables\Columns\TextColumn::make('rt'),
                Tables\Columns\TextColumn::make('rw'),
                Tables\Columns\TextColumn::make('dusun'),
                Tables\Columns\TextColumn::make('no_telp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
