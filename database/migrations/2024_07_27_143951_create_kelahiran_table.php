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
            $table->string('nama_bayi', 100);
            $table->date('tanggal_lahir');
            $table->boolean('akta_kelahiran');
            $table->enum('kelamin', ['Laki-laki', 'Perempuan'])->notNull();
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
        Schema::dropIfExists('kelahiran');
    }
};
