<?php

namespace App\Filament\Dasawisma\Resources\KehamilanResource\Pages;

use App\Filament\Dasawisma\Resources\KehamilanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Kehamilan;

class EditKehamilan extends EditRecord
{
    protected static string $resource = KehamilanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->action(function (Kehamilan $record) {
                    $record->kelahiran()->delete();
                    $record->kematian()->delete();
                    $record->delete();
                    
                    return redirect('/dasawisma/kehamilans');
                }),
        ];
    }
}
