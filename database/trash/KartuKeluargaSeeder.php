<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KartuKeluarga;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can use a loop to create multiple records
        for ($i = 1; $i <= 800; $i++) {
            KartuKeluarga::create([]);
        }
    }
}
