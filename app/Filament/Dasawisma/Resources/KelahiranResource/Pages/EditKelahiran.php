<?php

namespace App\Filament\Dasawisma\Resources\KelahiranResource\Pages;

use App\Filament\Dasawisma\Resources\KelahiranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelahiran extends EditRecord
{
    protected static string $resource = KelahiranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
