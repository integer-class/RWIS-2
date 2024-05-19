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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->string('id_pengumuman', 100)->collation('utf8mb4_0900_ai_ci')->primary();
            $table->foreignId('nik')->references('nik')->on('penduduk');
            $table->string('judul');
            $table->string('kepentingan');
            $table->text('isi_pengumuman');
            $table->string('foto')->nullable();
            $table->date('tanggal_pengumuman');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
