<?php

namespace App\Filament\Widgets;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;
class roleTotal extends BaseWidget
{

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = '2';
    protected function getStats(): array
    {

        
        $admin = 'admin';
        $user = 'user';
        $dasawisma = 'dasawisma';

        $totalAdmin= DB::table('users')
        ->where('usertype', $admin)
        ->count();
        $totalUser= DB::table('users')
        ->where('usertype', $user)
        ->count();
        $totalDasawisma= DB::table('users')
        ->where('usertype', $dasawisma)
        ->count();
        return [
            Stat::make('Admin', $totalAdmin)
            ->label('Total akun bertipe Admin'),
            Stat::make('User', $totalUser)
            ->label('Total akun bertipe User'),
            Stat::make('Jumlah User', $totalDasawisma)
            ->label('Total akun bertipe Dasawisma'),
        ];
    }
}
