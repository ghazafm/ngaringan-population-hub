<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kehamilan;
use App\Models\Kelahiran;
use App\Models\Kematian;
use Faker\Factory as Faker;

class KehamilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Assuming you have Penduduk data available, we'll get IDs from Penduduk table
        $pendudukIds = \App\Models\Penduduk::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            $status = $faker->randomElement(['hamil', 'melahirkan', 'nifas', 'meninggal']);

            $kehamilan = Kehamilan::create([
                'status' => $status,
                'nama_suami' => $faker->name,
                'id_ibu' => $faker->randomElement($pendudukIds),
            ]);

            if ($status === 'melahirkan' || $status === 'nifas') {
                Kelahiran::create([
                    'nama_bayi' => $faker->firstName,
                    'tanggal_lahir' => $faker->date,
                    'akta_kelahiran' => $faker->boolean,
                    'kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                    'id_kehamilan' => $kehamilan->id_kehamilan,
                ]);
            } elseif ($status === 'Meninggal') {
                Kematian::create([
                    'status' => $faker->randomElement(['ibu', 'anak']),
                    'nama' => $faker->name,
                    'kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                    'tanggal' => $faker->date,
                    'sebab' => $faker->optional()->sentence,
                    'keterangan' => $faker->sentence,
                    'id_kehamilan' => $kehamilan->id_kehamilan,
                ]);
            }
        }
    }
}
