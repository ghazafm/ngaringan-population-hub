<?php

namespace App\Filament\Dasawisma\Resources\KehamilanResource\Pages;

use App\Filament\Dasawisma\Resources\KehamilanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKehamilan extends EditRecord
{
    protected static string $resource = KehamilanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
