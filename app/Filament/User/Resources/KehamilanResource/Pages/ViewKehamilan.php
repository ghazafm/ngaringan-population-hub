<?php

namespace App\Filament\User\Resources\KehamilanResource\Pages;

use App\Filament\User\Resources\KehamilanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKehamilan extends ViewRecord
{
    protected static string $resource = KehamilanResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\EditAction::make(),
        ];
    }
}
