<?php

namespace App\Filament\Dasawisma\Resources\PendudukResource\Pages;

use App\Filament\Dasawisma\Resources\PendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPenduduk extends ViewRecord
{
    protected static string $resource = PendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
