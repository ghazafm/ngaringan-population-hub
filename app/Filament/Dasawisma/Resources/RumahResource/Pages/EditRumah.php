<?php

namespace App\Filament\Dasawisma\Resources\RumahResource\Pages;

use App\Filament\Dasawisma\Resources\RumahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRumah extends EditRecord
{
    protected static string $resource = RumahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
