<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KartuKeluarga;
use Faker\Factory as Faker;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            KartuKeluarga::create([
                'no_kk' => $faker->unique()->numerify('################'), // Adjust based on your actual IDs
            ]);
        }
    }
}
