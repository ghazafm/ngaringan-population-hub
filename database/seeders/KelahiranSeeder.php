<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelahiran;
use Faker\Factory as Faker;

class KelahiranSeeder extends Seeder
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
            Kelahiran::create([
                'nama_bayi' => $faker->firstName,
                'tanggal_lahir' => $faker->date,
                'akta_kelahiran' => $faker->boolean,
                'kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'id_kehamilan' => $faker->optional()->randomElement($kehamilanIds),
            ]);
        }
    }
}
