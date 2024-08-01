<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kematian;
use Faker\Factory as Faker;

class KematianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Assuming you have Kehamilan data available, we'll get IDs from Kehamilan table
        $kehamilanIds = \App\Models\Kehamilan::pluck('id_kehamilan')->toArray();

        for ($i = 0; $i < 20; $i++) {
            Kematian::create([
                'status' => $faker->randomElement(['ibu', 'anak']),
                'nama' => $faker->name,
                'kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'tanggal' => $faker->date,
                'sebab' => $faker->optional()->sentence,
                'keterangan' => $faker->sentence,
                'id_kehamilan' => $faker->optional()->randomElement($kehamilanIds),
            ]);
        }
    }
}
