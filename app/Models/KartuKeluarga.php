<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';

    protected $primaryKey = 'no_kk';
    public $incrementing = false;
    protected $keyType = 'bigInteger';

    public $timestamps = true;
    protected $fillable = [
        'no_kk',
        'kepala_keluarga',
    ];

    public function anggota(){
        return $this->hasMany(Penduduk::class, 'no_kk');
    }

    public function kepalaKeluarga(){
        return $this->belongsTo(Penduduk::class, 'kepala_keluarga');
    }
}
