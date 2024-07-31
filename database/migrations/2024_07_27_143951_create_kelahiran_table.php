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
        Schema::create('kelahiran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kehamilan');
            $table->string('nama_bayi', 100);
            $table->date('tanggal_lahir');
            $table->boolean('akta_kelahiran');
            $table->enum('kelamin', ['Laki-laki', 'Perempuan']);
            $table->timestamps();

            $table->foreign('id_kehamilan')->references('id_kehamilan')->on('kehamilan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelahiran');
    }
};
