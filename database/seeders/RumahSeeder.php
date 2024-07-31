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
                'dasawisma' => $faker->userName,
                'dusun' => $faker->randomElement(['ngaringan', 'bintang', 'purwosari', 'gondoroso']),
                'desa' => 'ngaringan',
                'kecamatan' => 'gandusari',
                'kabupaten' => 'blitar',
                'provinsi' => 'jawa timur',
                'makanan_pokok' => $faker->randomElement(['beras', 'non beras']),
                'jamban' => $faker->boolean,
                'sumber_air' => $faker->randomElement(['pdam', 'sumur', 'sungai', 'lainnya']),
                'pembuangan_sampah' => $faker->boolean,
                'saluran_air_limbah' => $faker->boolean,
                'stiker_p4k' => $faker->boolean,
                'kriteria_rumah' => $faker->randomElement(['sehat', 'kurang sehat']),
                'aktifitas_up2k' => $faker->boolean,
                'kegiatan_lingkungan' => $faker->boolean,
            ]);
        }
    }
}
