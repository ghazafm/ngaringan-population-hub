<?php

namespace App\Filament\Dasawisma\Resources\KartuKeluargaResource\Pages;

use App\Filament\Dasawisma\Resources\KartuKeluargaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKartuKeluargas extends ListRecords
{
    protected static string $resource = KartuKeluargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
