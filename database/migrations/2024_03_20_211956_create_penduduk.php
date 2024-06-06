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
            $table->id('nik');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->enum('golong_darah', ['A', 'B', 'AB', 'O']);
            $table->string('agama');
            $table->enum('status_perkawinan', ['Kawin', 'Belum Kawin', 'Cerai']);
            $table->string('pekerjaan');
            $table->string('foto')->nullable();
            $table->enum('status', ['hidup', 'meninggal','pindah'])->default('hidup');
            $table->foreignId('nomor_kk')->references('nomor_kk')->on('kartu_keluarga');
            $table->enum('arsip', ['true', 'false'])->default('false');
            $table->integer('pendapatan');
            $table->enum('status_sosial', ['Janda','yatimpiatu', 'Lainnya']);
            $table->enum('status_rumah', ['Sewa', 'Kontrak', 'Milik', 'Lainnya']);
            $table->enum('status_kesehatan', ['Sehat', 'Sakit', 'Disabilitas']);
            $table->foreignId('id_rt')->references('id_rt')->on('rt');



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

