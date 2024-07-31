<?php

namespace App\Filament\Dasawisma\Resources\KematianResource\Pages;

use App\Filament\Dasawisma\Resources\KematianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKematian extends EditRecord
{
    protected static string $resource = KematianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
