<?php

namespace App\Filament\User\Resources\RumahResource\Pages;

use App\Filament\User\Resources\RumahResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRumah extends ViewRecord
{
    protected static string $resource = RumahResource::class;

    protected function getHeaderActions(): array
    {
        return [
         //   Actions\EditAction::make(),
        ];
    }
}
