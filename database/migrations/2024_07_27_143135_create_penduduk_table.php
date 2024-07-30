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
            $table->string('no_kk');
            $table->string('nama', 100);
            $table->enum('status_perkawinan', ['Tidak Kawin', 'Kawin'])->nullable();
            $table->enum('kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->enum('pendidikan', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3', 'Lainnya'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('status_dalam_keluarga', ['Suami', 'Istri', 'Anak', 'Menantu Keluarga', 'Lainnya'])->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->boolean('pbi')->default(false);
            $table->enum('keterangan', ['Penduduk', 'Pindah', 'Meninggal']);
            $table->unsignedBigInteger('id_rumah');
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
