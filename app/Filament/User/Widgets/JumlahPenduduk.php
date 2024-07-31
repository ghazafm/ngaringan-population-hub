<?php

namespace App\Filament\User\Widgets;

use App\Models\Kematian;
use App\Models\Rumah;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class JumlahPenduduk extends BaseWidget
{
    protected function getStats(): array
    {
        $category = 'penduduk';
        $kategori = 'status'; 

        
        $jumlahPenduduk = DB::table('penduduk')
            ->where('keterangan', $category)
            ->count();

        

        return [
            Stat::make('Jumlah Penduduk', $jumlahPenduduk)
                ->description('Jumlah Penduduk Saat Ini')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Kematian',Kematian::query()->count())
                ->description('Jumlah Kematian Saat Ini')
                ->descriptionIcon('heroicon-m-users')
                ->color('danger'),
            Stat::make('Rumah',Rumah::query()->count())
                ->description('Jumlah Rumah Saat Ini')
                ->descriptionIcon('heroicon-m-home'),
                
                
        ];
    }
}
