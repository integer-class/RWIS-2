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
        Schema::create('komplain', function (Blueprint $table) {
            $table->id("id_komplain");
            $table->string('judul_komplain');
            $table->foreignId('id_kategori_komplain')->references('id_kategori_komplain')->on('kategori_komplain');
            $table->foreignId('nik')->references('nik')->on('users');
            $table->text('isi_komplain');
            $table->string('foto_komplain')->nullable();
            $table->enum('status_komplain', ['Diterima', 'Diproses', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komplain');
    }
};
