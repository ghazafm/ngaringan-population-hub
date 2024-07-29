<?php

namespace App\Filament\Dasawisma\Resources\RumahResource\Pages;

use App\Filament\Dasawisma\Resources\RumahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRumahs extends ListRecords
{
    protected static string $resource = RumahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
