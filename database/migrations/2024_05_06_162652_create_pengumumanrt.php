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
            $table->unsignedBigInteger('id_pengumuman');
            $table->unsignedBigInteger('id_rt');
            $table->primary(['id_pengumuman', 'id_rt']);
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
