<?php

namespace App\Filament\User\Resources\KelahiranResource\Pages;

use App\Filament\User\Resources\KelahiranResource;
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
