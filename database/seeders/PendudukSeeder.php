<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;
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

        for ($i = 0; $i < 100; $i++) {
            Penduduk::create([
                'status_perkawinan' => $faker->randomElement(['Tidak Kawin', 'Kawin']),
                'kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'nama' => $faker->name,
                'pendidikan' => $faker->randomElement(['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3', 'Lainnya']),
                'tanggal_lahir' => $faker->date('Y-m-d', '2000-12-31'),
                'status_dalam_keluarga' => $faker->randomElement(['Suami', 'Istri', 'Anak', 'Menantu Keluarga', 'Lainnya']),
                'pekerjaan' => $faker->jobTitle,
                'keterangan' => $faker->randomElement(['Penduduk', 'Pindah', 'Meninggal']),
                'no_reg' => $faker->numerify('####'),
                'pbi' => $faker->randomElement([true,false]),
                'no_kk' => $faker->numerify('################'), 
                'id_rumah' => rand(1, 250),
            ]);
        }
    }
}
