<?php

namespace App\Filament\Dasawisma\Resources\KartuKeluargaResource\Pages;

use App\Filament\Dasawisma\Resources\KartuKeluargaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\App;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;

class EditKartuKeluarga extends EditRecord
{
    protected static string $resource = KartuKeluargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
            
            ->action(function (KartuKeluarga $record) {
                // Update related Penduduk records
                Penduduk::where('no_kk', $record->no_kk)->update(['no_kk' => null]);

                // Delete the KartuKeluarga record
                $record->delete();

                return redirect('/dasawisma/kartu-keluargas');
            }),
        ];
    }
}
