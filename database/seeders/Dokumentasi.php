<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dokumentasi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\Dokumentasi::factory()->create([
            'judul' => 'Membereskan Sampah',
            'deskripsi' => 'Gotong royong membersihkan sampah di sekitar lingkungan RW 01',
            'tanggal' => '2024-05-17',
            'kategori' => 'Gotong Royong',
            'nik' => '1234567890123456',
            'thumbnail' => '1715974412.jpg',
        ]);
    }
}
