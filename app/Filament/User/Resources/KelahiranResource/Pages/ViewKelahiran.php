<?php

namespace App\Filament\User\Resources\KelahiranResource\Pages;

use App\Filament\User\Resources\KelahiranResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKelahiran extends ViewRecord
{
    protected static string $resource = KelahiranResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\EditAction::make(),
        ];
    }
}
