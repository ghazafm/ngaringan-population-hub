<?php

namespace App\Filament\Resources\KehamilanResource\Pages;

use App\Filament\Resources\KehamilanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKehamilan extends EditRecord
{
    protected static string $resource = KehamilanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
