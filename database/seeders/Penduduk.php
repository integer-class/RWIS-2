<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Penduduk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Penduduk::factory()->create([
            'nik' => '1234567890123456',
            'nama' => 'Test User',
            'nomor_kk' => '161092610',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'L',
            'golong_darah' => 'A',
            'alamat' => 'Jl. Test No. 1',
            'agama' => 'Islam',
            'status_perkawinan' => 'Belum Kawin',
            'pekerjaan' => 'PNS',
        ]);
    }
}
