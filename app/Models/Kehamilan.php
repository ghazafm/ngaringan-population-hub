<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehamilan extends Model
{
    use HasFactory;

    protected $table = 'kehamilan';

    protected $primaryKey = 'id_kehamilan';

    public $incrementing = true;

    protected $fillable = ['status', 'nama_suami', 'id_ibu'];

    public function ibu()
    {
        return $this->belongsTo(Penduduk::class, 'id_ibu', 'no_reg');
    }

    public function kelahiran()
    {
        return $this->hasMany(Kelahiran::class, 'id_kehamilan', 'id_kehamilan');
    }

    public function kematian()
    {
        return $this->hasMany(Kematian::class, 'id_kehamilan', 'id_kehamilan');
    }
}
