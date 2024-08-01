<?php

namespace App\Filament\Widgets;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class userDesa extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = '2';
    protected function getStats(): array
    {
        $gondoreso = 'gondoroso';
        $bintang = 'bintang';
        $ngaringan = 'ngaringan';
        $purwosari = 'purwosari';

        $totalGondoreso= DB::table('users')
        ->where('dusun', $gondoreso)
        ->count();
        $totalBintang= DB::table('users')
        ->where('dusun', $bintang)
        ->count();
        $totalNgaringan= DB::table('users')
        ->where('dusun', $ngaringan)
        ->count();
        $totalPurwosari= DB::table('users')
        ->where('dusun', $purwosari)
        ->count();

        return [
            
            Stat::make('Jumlah User', $totalGondoreso)
            ->label('Jumlah User Gondoreso'),
            Stat::make('Jumlah User', $totalBintang)
            ->label('Jumlah User Bintang'),
            Stat::make('Jumlah User', $totalNgaringan)
            ->label('Jumlah User Ngaringan'),
            Stat::make('Jumlah User', $totalPurwosari)
            ->label('Jumlah User Purwosari'),
            
        ];
    }
}
