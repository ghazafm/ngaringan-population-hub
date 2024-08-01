<?php

namespace App\Filament\Dasawisma\Resources\KematianResource\Pages;

use App\Filament\Dasawisma\Resources\KematianResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKematian extends ViewRecord
{
    protected static string $resource = KematianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
