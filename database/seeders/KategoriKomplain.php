<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriKomplain extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\KategoriKomplain::factory()->create([
            'nama_kategori_komplain' => 'sampah',
        ]);
   
        \App\Models\KategoriKomplain::factory()->create([
            'nama_kategori_komplain' => 'kebersihan',
        ]);
        \App\Models\KategoriKomplain::factory()->create([
            'nama_kategori_komplain' => 'keamanan',
        ]);
        \App\Models\KategoriKomplain::factory()->create([
            'nama_kategori_komplain' => 'fasilitas umum',
        ]);

      
    }
}
