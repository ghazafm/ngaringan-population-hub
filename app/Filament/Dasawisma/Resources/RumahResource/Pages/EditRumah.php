<?php

namespace App\Filament\Dasawisma\Resources\RumahResource\Pages;

use App\Filament\Dasawisma\Resources\RumahResource;
use App\Http\Middleware\Dasawisma;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Penduduk;
use App\Models\Rumah;

class EditRumah extends EditRecord
{
    protected static string $resource = RumahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
            ->action(function (Rumah $record) {
                // Update related Penduduk records
                Penduduk::where('id_rumah', $record->id_rumah)->update(['id_rumah' => null]);

                // Delete the Rumah record
                $record->delete();

                return redirect('/dasawisma/rumahs');
            }),
        ];
    }
}
