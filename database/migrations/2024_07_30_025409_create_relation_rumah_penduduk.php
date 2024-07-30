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
        Schema::table('rumah', function (Blueprint $table) {
            $table->foreign('kepala_rumah_tangga')->references('id')->on('penduduk')->onDelete('cascade');
        });

        Schema::table('penduduk', function (Blueprint $table) {
            $table->foreign('id_rumah')->references('id_rumah')->on('rumah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penduduk', function (Blueprint $table) {
            $table->dropForeign(['id_rumah']);
        });

        Schema::table('rumah', function (Blueprint $table) {
            $table->dropForeign(['kepala_rumah_tangga']);
        });
    }
};
