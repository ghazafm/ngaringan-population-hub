<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use App\Models\Rumah;
use Faker\Factory as Faker;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $rumahIds = Rumah::pluck('id_rumah')->toArray(); // Fetch all id_rumah from rumah table

        for ($i = 0; $i < 100; $i++) {
            Penduduk::create([
                'no_reg' => $faker->numerify('####'),
                'no_kk' => $faker->numerify('################'),
                'nama' => $faker->name,
                'status_perkawinan' => $faker->randomElement(['Tidak Kawin', 'Kawin']),
                'kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'pendidikan' => $faker->randomElement(['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3', 'Lainnya']),
                'tanggal_lahir' => $faker->date('Y-m-d', '2000-12-31'),
                'status_dalam_keluarga' => $faker->randomElement(['Suami', 'Istri', 'Anak', 'Menantu Keluarga', 'Lainnya']),
                'pekerjaan' => $faker->jobTitle,
                'pbi' => $faker->boolean,
                'keterangan' => $faker->randomElement(['Penduduk', 'Pindah', 'Meninggal']),
                'id_rumah' => $faker->randomElement($rumahIds), // Assign random existing id_rumah
            ]);
        }
    }
}
