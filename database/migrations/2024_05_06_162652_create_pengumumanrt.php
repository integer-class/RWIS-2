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
        Schema::create('pengumuman_rt', function (Blueprint $table) {
            $table->string('id_pengumuman', 100)->collation('utf8mb4_0900_ai_ci');
            $table->unsignedBigInteger('id_rt');
            $table->primary(['id_pengumuman', 'id_rt']);

         
            $table->foreign('id_pengumuman')->references('id_pengumuman')->on('pengumuman')->onDelete('cascade');
            // Anda juga bisa menambahkan constraint foreign key untuk id_rt jika diperlukan
            $table->foreign('id_rt')->references('id_rt')->on('rt')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumumanrt');
    }
};
