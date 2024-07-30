<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;

class KartuKeluarga extends Model
{
    use HasFactory;

    // Disable timestamps since this model doesn't correspond to a database table
    public $timestamps = false;

    // The no_kk for this KartuKeluarga instance
    protected $no_kk;

    // Constructor to initialize no_kk
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        // If no_kk is passed in attributes, set it
        if (isset($attributes['no_kk'])) {
            $this->no_kk = $attributes['no_kk'];
        }
    }

    // Method to set no_kk
    public function setNoKk($no_kk)
    {
        $this->no_kk = $no_kk;
    }

    // Method to get members of this KartuKeluarga
    public function getMembers()
    {
        return Penduduk::byNoKk($this->no_kk)->get();
    }
}
