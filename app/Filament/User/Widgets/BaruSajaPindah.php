<?php

namespace App\Filament\User\Widgets;

use App\Models\Penduduk;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class BaruSajaPindah extends BaseWidget
{
    protected static ?int $sort = 5;

    public function table(Table $table): Table
    {
        return $table
            ->query(Penduduk::query()->where('keterangan', 'pindah'))
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama'),
                Tables\Columns\TextColumn::make('keterangan')->label('Keterangan')->formatStateUsing(function ($record) {
                    return 'Pindah';
                }),
            ]);
    }
}
