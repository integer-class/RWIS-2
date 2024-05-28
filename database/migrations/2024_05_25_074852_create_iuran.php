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
        Schema::create('iuran', function (Blueprint $table) {
            $table->bigIncrements('id_iuran');
            $table->foreignId('id_rt')->references('id_rt')->on('rt');
            $table->unsignedBigInteger('nomor_kk');
            $table->decimal('jumlah', 10, 2);
            $table->date('tanggal');
            $table->string('keterangan')->nullable();
            $table->enum('status', ['pengeluaran', 'pemasukan'])->default('pemasukan');


            $table->boolean('is_paid')->default(false);
            $table->timestamps();

            $table->foreign('nomor_kk')->references('nomor_kk')->on('kartu_keluarga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran');
    }
};
