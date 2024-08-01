<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id('id');
            $table->string('no_reg')->nullable();
            $table->unsignedBigInteger('no_kk')->nullable();
            $table->string('nama', 100);
            $table->enum('status_perkawinan', [
                'belum kawin', 
                'kawin', 
                'cerai hidup', 
                'cerai mati'
            ])->nullable();
            $table->enum('kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->enum('pendidikan', [
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
            ])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('status_dalam_keluarga', [ 
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
            ])->nullable();
            $table->enum('pekerjaan', [
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
            ])->nullable();
            $table->boolean('pbi')->default(false);
            $table->enum('keterangan', ['penduduk', 'pindah', 'meninggal'])->default('penduduk');
            $table->unsignedBigInteger('id_rumah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
