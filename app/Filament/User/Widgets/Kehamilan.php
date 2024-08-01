<?php

namespace App\Filament\User\Widgets;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use Filament\Widgets\ChartWidget;

class Kehamilan extends ChartWidget
{
    protected function getData(): array
    {
        $data = Trend::model(\App\Models\Kehamilan::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
     
        return [
            'datasets' => [
                [
                    'label' => 'Data Kehamilan Tahun ini',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
