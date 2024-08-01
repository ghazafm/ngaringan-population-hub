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
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Schema;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
        
            ->schema([
                Section::make("Daftar User")->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Nama'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                Forms\Components\Select::make('usertype')
                    ->label(__('Tipe User'))
                    ->required()
                    ->options([
                        'user'=>'User',
                        'admin'=>'Admin',
                        'dasawisma'=>'Dasawisma'
                    ])
                    ->native(false)
                    ->placeholder('Pilih Sebuah Opsi'),
                Forms\Components\Select::make('rt')
                    ->label(__('Nomor RT'))
                    ->required()
                    ->options([
                        '1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                        '4'=>'4',
                        '5'=>'5'
                    ])
                    ->native(false)
                    ->placeholder('Pilih Sebuah Opsi'),
                    Forms\Components\TextInput::make('no_telp')
                    ->label(__('Nomor Telpon'))
                    ->tel()
                    ->numeric()
                    ->maxLength(255)
                    ->default(null)
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Select::make('rw')
                    ->label(__('Nomor RW'))
                    ->required()
                    ->options([
                        '1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                    ])
                    ->native(false)
                    ->placeholder('Pilih Sebuah Opsi'),
                Forms\Components\Select::make('dusun')
                    ->label(__('Letak Dusun'))
                    ->required()
                    ->options([
                        'gondoroso' => 'gondoroso',
                        'purwosari' => 'purwosari',
                        'ngaringan' => 'ngaringan',
                        'bintang' => 'bintang',
                    ]
                    )
                    ->native(false)
                    ->placeholder('Pilih Sebuah Opsi')
                    ->required(),
                    
                ])->columns(4),
                    Section::make("Daftar email")->schema([
                        Forms\Components\TextInput::make('email')
                        ->label(__('Email'))
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2)
                        ->revealable()
                        ->dehydrateStateUsing(fn ($state) => !empty($state) ? bcrypt($state) : null)
                        ->required(fn ($context) => $context === 'create'),
                        ])->columns(4)
                    ])
                    ;
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
                    Tables\Columns\TextColumn::make('password')
                    ->searchable()
                    ->hidden(),
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
