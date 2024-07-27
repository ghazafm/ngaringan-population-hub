<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';

    protected $primaryKey = 'id_kk';

    public $incrementing = true;

    protected $fillable = ['id_kk'];

    // Define relationships if needed
}
