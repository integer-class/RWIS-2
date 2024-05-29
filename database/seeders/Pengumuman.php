<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Pengumuman extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Pengumuman::factory(3)->create();

        \App\Models\Pengumuman::factory()->create([
            'id_pengumuman' => '13123', 
            'nik' => '1234567890123456',
            'judul' => 'Pengumuman Penting',
            'isi_pengumuman' => 'Perhatian warga RT 02, kami ingin menginformasikan bahwa akan ada penutupan jalan pada [tanggal] untuk keperluan pemeliharaan. Mohon gunakan rute alternatif. Terima kasih atas pengertian dan kerjasama Anda.',
            'foto' => 'default.jpg',
            'tanggal_pengumuman' => '2024-12-06',
            'kepentingan' => 'Penting',
        ]);

    }
}
