<?php

namespace App\Filament\User\Resources\PendudukResource\Pages;

use App\Filament\User\Resources\PendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPenduduk extends ViewRecord
{
    protected static string $resource = PendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\EditAction::make(),
        ];
    }
}
