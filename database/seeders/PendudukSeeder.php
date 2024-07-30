<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use App\Models\Rumah;
use App\Models\KartuKeluarga;
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
        $rumahIds = Rumah::pluck('id_rumah')->toArray(); // Fetch all id from rumah table
        $kartuKeluarga = KartuKeluarga::pluck('no_kk')->toArray();

        // Define an array of job titles
        $pekerjaanOptions = [
            'belum/tidak bekerja',
            'mengurus rumah tangga',
            'pelajar/mahasiswa',
            'pensiunan',
            'pegawai negeri sipil (pns)',
            'tentara nasional indonesia (tni)',
            'kepolisian ri (polri)',
            'perdagangan',
            'petani/pekebun',
            'peternak',
            'nelayan/perikanan',
            'industri',
            'konstruksi',
            'transportasi',
            'karyawan swasta',
            'karyawan bumn',
            'karyawan bumd',
            'karyawan honorer',
            'buruh harian lepas',
            'buruh tani/perkebunan',
            'buruh nelayan/perikanan',
            'buruh peternakan',
            'pembantu rumah tangga',
            'tukang cukur',
            'tukang listrik',
            'tukang batu',
            'tukang kayu',
            'tukang sol sepatu',
            'tukang las/pandai besi',
            'tukang jahit',
            'tukang gigi',
            'penata rias',
            'penata busana',
            'mekanik',
            'seniman',
            'tabib',
            'paraji',
            'perancang busana',
            'penterjemah',
            'imam masjid',
            'pendeta',
            'pator',
            'wartawan',
            'ustadz/mubaligh',
            'juru masak',
            'promotor acara',
            'anggota dpr-ri',
            'anggota dpd',
            'anggota bpk',
            'presiden',
            'wakil presiden',
            'anggota mahkamah konstitusi',
            'anggota kabinet kementrian',
            'duta besar',
            'gubernur',
            'wakil gubernur',
            'bupati',
            'wakil bupati',
            'walikota',
            'wakil walikota',
            'anggota dprp prop.',
            'anggota dprp kab.',
            'dosen',
            'guru',
            'pilot',
            'pengacara',
            'notaris',
            'arsitek',
            'akuntan',
            'konsultan',
            'dokter',
            'bidan',
            'perawat',
            'apoteker',
            'psikiater/psikolog',
            'penyiar televisi',
            'penyiar radio',
            'pelaut',
            'peneliti',
            'sopir',
            'pialang',
            'paranormal',
            'pedagang',
            'perangkat desa',
            'kepala desa',
            'biarawati',
            'wiraswasta',
            'lainnya'
        ];

        for ($i = 0; $i < 2000; $i++) {
            Penduduk::create([
                'no_reg' => $faker->optional()->numerify('####'),
                'no_kk' => $faker->randomElement($kartuKeluarga),
                'nama' => $faker->name,
                'status_perkawinan' => $faker->randomElement(['belum kawin', 'kawin', 'cerai hidup', 'cerai mati']),
                'kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'pendidikan' => $faker->randomElement([
                    'tidak/belum sekolah',
                    'belum tamat sd/sederajat',
                    'tamat sd/sederajat',
                    'sltp/sederajat',
                    'slta/sederajat',
                    'diploma i/ii',
                    'akademi/diploma iii/sarjana muda',
                    'diploma iv/strata i',
                    'strata ii',
                    'strata iii'
                ]),
                'tanggal_lahir' => $faker->date('Y-m-d', '2000-12-31'),
                'status_dalam_keluarga' => $faker->randomElement([
                    'suami', 
                    'istri', 
                    'anak', 
                    'menantu', 
                    'cucu', 
                    'orangtua', 
                    'mertua', 
                    'famili lain', 
                    'pembantu', 
                    'lainnya'
                ]),
                'pekerjaan' => $faker->randomElement($pekerjaanOptions),
                'pbi' => $faker->boolean,
                'keterangan' => $faker->randomElement(['penduduk', 'pindah', 'meninggal']),
                'id_rumah' => $faker->randomElement($rumahIds),
            ]);
        }
    }
}
