<?php

namespace App\Filament\Widgets;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconPosition;

class userTotal extends BaseWidget
{
    protected static ?int $sort = 0;
    protected int | string | array $columnSpan = 'full';
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah User', User::count())
            ->color('success')
            ->description('Jumlah Akun yang aktif')
            ->descriptionIcon('heroicon-m-user-circle', IconPosition::Before)
            ,
        ];
    }
}
