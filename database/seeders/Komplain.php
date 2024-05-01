<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Komplain extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Komplain::factory()->create([
            'nik' => 1234567890123456,
            'judul_komplain' => 'Judul Komplain 1',
           'id_kategori_komplain' => 1,



            'isi_komplain' => 'Komplain 1',
            'status_komplain' => 'Diterima',
        ]);

        \App\Models\Komplain::factory()->create([
            'nik' => 1234567890123457,
           'judul_komplain' => 'Judul Komplain 2',
           'id_kategori_komplain' => 1,

            'isi_komplain' => 'Komplain 2',
            'status_komplain' => 'Diproses',
        ]);

        \App\Models\Komplain::factory()->create([
            'nik' => 1234567890123458,
            'judul_komplain' => 'Judul Komplain 3',
           'id_kategori_komplain' => 1,

            'isi_komplain' => 'Komplain 3',
            'status_komplain' => 'Selesai',
        ]);
       

    }
}
