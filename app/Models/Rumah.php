<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $table = 'rumah';

    protected $primaryKey = 'id_rumah';

    public $incrementing = true;

    protected $fillable = [
        'rt', 'rw', 'dasawisma', 'desa', 'dusun', 'kecamatan',
        'makanan_pokok', 'jamban', 'sumber_air', 'pembuangan_sampah',
        'saluran_air_limbah', 'stiker_p4k', 'kriteria_rumah',
        'aktifitas_up2k', 'kegiatan_lingkungan'
    ];

    // Define relationships if needed
}
