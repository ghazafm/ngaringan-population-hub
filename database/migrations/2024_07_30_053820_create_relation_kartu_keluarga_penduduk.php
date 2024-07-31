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
        // Ensure the column in kartu_keluarga is indexed
        // Schema::table('kartu_keluarga', function (Blueprint $table) {
        //     $table->index('no_kk');
        // });

        // Adding foreign key constraint to the `penduduk` table
        Schema::table('penduduk', function (Blueprint $table) {
            $table->foreign('no_kk')->references('no_kk')->on('kartu_keluarga')->onDelete('cascade');
        });

        // Adding foreign key constraint to the `kartu_keluarga` table
        Schema::table('kartu_keluarga', function (Blueprint $table) {
            $table->foreign('kepala_keluarga')->references('id')->on('penduduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping foreign key constraints from the `penduduk` table
        Schema::table('penduduk', function (Blueprint $table) {
            $table->dropForeign(['no_kk']);
        });

        // Dropping foreign key constraints from the `kartu_keluarga` table
        Schema::table('kartu_keluarga', function (Blueprint $table) {
            $table->dropForeign(['kepala_keluarga']);
        });

        // Dropping the index on `no_kk` from the `kartu_keluarga` table
        Schema::table('kartu_keluarga', function (Blueprint $table) {
            $table->dropIndex(['no_kk']);
        });
    }
};
