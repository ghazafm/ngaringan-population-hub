<?php

namespace App\Filament\User\Widgets;

use App\Models\Penduduk;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PendudukBaruDitambahkan extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(Penduduk::query())
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('kelamin'),
                Tables\Columns\TextColumn::make('tanggal_lahir'),
            ]);
    }
}
