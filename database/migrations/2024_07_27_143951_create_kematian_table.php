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
        Schema::create('kematian', function (Blueprint $table) {
            $table->enum('status', ['Ibu', 'Anak'])->nullable();
            $table->string('nama', 100);
            $table->enum('kelamin', ['Laki-laki', 'Perempuan'])->notNull();
            $table->date('tanggal');
            $table->string('sebab', 255)->nullable();
            $table->string('keterangan', 255);
            $table->unsignedBigInteger('id_kehamilan')->nullable();
            $table->timestamps();

            $table->foreign('id_kehamilan')->references('id_kehamilan')->on('kehamilan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kematian');
    }
};
