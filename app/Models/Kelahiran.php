<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;

    protected $table = 'kelahiran';

    protected $fillable = ['nama_bayi', 'tanggal_lahir', 'akta_kelahiran', 'kelamin', 'id_kehamilan'];

    public function kehamilan()
    {
        return $this->belongsTo(Kehamilan::class, 'id_kehamilan', 'id_kehamilan');
    }
}
