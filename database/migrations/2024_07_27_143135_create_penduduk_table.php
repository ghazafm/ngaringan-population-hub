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
            $table->increments('no_reg');
            $table->enum('status_perkawinan', ['Tidak Kawin', 'Kawin'])->default('Tidak Kawin');
            $table->enum('kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nama', 100);
            $table->enum('pendidikan', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3', 'Lainnya'])->nullable();
            $table->date('tanggal_lahir');
            $table->enum('status_dalam_keluarga', ['Suami', 'Istri', 'Anak', 'Menantu Keluarga', 'Lainnya']);
            $table->string('pekerjaan', 100)->nullable();
            $table->enum('keterangan', ['Menetap', 'Pindah', 'Meninggal']);
            $table->unsignedInteger('id_kk');
            $table->unsignedInteger('id_rumah');
            $table->timestamps();

            $table->foreign('id_kk')->references('id_kk')->on('kartu_keluarga')->onDelete('cascade');
            $table->foreign('id_rumah')->references('id_rumah')->on('rumah')->onDelete('cascade');
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
