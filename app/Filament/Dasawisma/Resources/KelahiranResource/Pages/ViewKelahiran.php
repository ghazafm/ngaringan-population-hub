<?php

namespace App\Filament\Dasawisma\Resources\KelahiranResource\Pages;

use App\Filament\Dasawisma\Resources\KelahiranResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKelahiran extends ViewRecord
{
    protected static string $resource = KelahiranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
