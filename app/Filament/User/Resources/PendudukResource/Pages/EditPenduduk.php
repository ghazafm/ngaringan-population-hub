<?php

namespace App\Filament\User\Resources\PendudukResource\Pages;

use App\Filament\User\Resources\PendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenduduk extends EditRecord
{
    protected static string $resource = PendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
