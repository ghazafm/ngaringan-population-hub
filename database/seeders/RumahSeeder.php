<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rumah;
use Faker\Factory as Faker;

class RumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 250; $i++) {
            Rumah::create([
                'rt' => $faker->numberBetween(1, 10),
                'rw' => $faker->numberBetween(1, 10),
                'dasawisma' => $faker->word,
                'desa' => $faker->word,
                'dusun' => $faker->word,
                'kecamatan' => $faker->word,
                'makanan_pokok' => $faker->randomElement(['Beras', 'Non Beras']),
                'jamban' => $faker->boolean,
                'sumber_air' => $faker->randomElement(['PDAM', 'Sumur', 'Sungai', 'Lainnya']),
                'pembuangan_sampah' => $faker->boolean,
                'saluran_air_limbah' => $faker->boolean,
                'stiker_p4k' => $faker->boolean,
                'kriteria_rumah' => $faker->randomElement(['Sehat', 'Kurang Sehat']),
                'aktifitas_up2k' => $faker->boolean,
                'kegiatan_lingkungan' => $faker->boolean,
            ]);
        }
    }
}
