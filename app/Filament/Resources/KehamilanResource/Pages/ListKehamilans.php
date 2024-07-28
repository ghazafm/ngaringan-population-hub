<?php

namespace App\Filament\Resources\KehamilanResource\Pages;

use App\Filament\Resources\KehamilanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKehamilans extends ListRecords
{
    protected static string $resource = KehamilanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
