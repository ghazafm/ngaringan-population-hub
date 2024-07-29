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

    public $timestamps = true;

    protected $fillable = [
        'rt',
        'rw',
        'dasawisma',
        'dusun',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'balita',
        'pus',
        'wus',
        'tiga_buta',
        'ibu_hamil',
        'ibu_menyusui',
        'lansia',
        'makanan_pokok',
        'jamban',
        'sumber_air',
        'pembuangan_sampah',
        'saluran_air_limbah',
        'stiker_p4k',
        'kriteria_rumah',
        'aktifitas_up2k',
        'kegiatan_lingkungan',
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class, 'id_rumah');
    }
    // Define relationships if needed
}
