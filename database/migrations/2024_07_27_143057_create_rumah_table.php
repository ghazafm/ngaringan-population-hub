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
        Schema::create('rumah', function (Blueprint $table) {
            $table->increments('id_rumah');
            $table->integer('rt')->unsigned();
            $table->integer('rw')->unsigned();
            $table->string('dasawisma', 100);
            $table->string('desa', 100);
            $table->string('dusun', 100);
            $table->string('kecamatan', 100);
            $table->enum('makanan_pokok', ['Beras', 'Non Beras']);
            $table->boolean('jamban');
            $table->enum('sumber_air', ['PDAM', 'Sumur', 'Sungai', 'Lainnya']);
            $table->boolean('pembuangan_sampah');
            $table->boolean('saluran_air_limbah');
            $table->boolean('stiker_p4k');
            $table->enum('kriteria_rumah', ['Sehat', 'Kurang Sehat']);
            $table->boolean('aktifitas_up2k');
            $table->boolean('kegiatan_lingkungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumah');
    }
};
