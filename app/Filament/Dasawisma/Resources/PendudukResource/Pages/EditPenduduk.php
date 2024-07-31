<?php

namespace App\Filament\Dasawisma\Resources\PendudukResource\Pages;

use App\Filament\Dasawisma\Resources\PendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Penduduk;
use App\Models\Rumah;

class EditPenduduk extends EditRecord
{
    protected static string $resource = PendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
            ->action(function (Penduduk $record) {
                // Update related Penduduk records
                Rumah::where('kepala_rumah_tangga', $record->id)->update(['kepala_rumah_tangga' => null]);

                // Delete the KartuKeluarga record
                $record->delete();

                return redirect('/dasawisma/kartu-keluargas');
            }),
        ];
    }
}
