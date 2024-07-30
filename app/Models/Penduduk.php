<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
        'no_reg',
        'status_perkawinan',
        'kelamin',
        'nama',
        'pendidikan',
        'tanggal_lahir',
        'status_dalam_keluarga',
        'pekerjaan',
        'keterangan',
        'pbi',
        'no_kk',
        'id_rumah'
    ];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'id_rumah');
    }

    public function scopeByNoKk($query, $noKk)
    {
        return $query->where('no_kk', $noKk);
    }
}
