<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;

    protected $table = 'kematian';

    protected $fillable = ['status', 'nama', 'kelamin', 'tanggal', 'sebab', 'keterangan', 'id_kehamilan'];

    public function kehamilan()
    {
        return $this->belongsTo(Kehamilan::class, 'id_kehamilan', 'id_kehamilan');
    }
}
