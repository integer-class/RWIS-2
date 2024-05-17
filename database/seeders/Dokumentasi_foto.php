<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dokumentasi_foto extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\Dokumentasi_foto::factory()->create([
            'id_dokumentasi' => '1',
            'filesize' => '1715974412',
            'path' => 'http://127.0.0.1:8000/images/1715976325_6647b885159ad.jpeg',
            'name' => '1715974412.jpg',
        ]);

        $user = \App\Models\Dokumentasi_foto::factory()->create([
            'id_dokumentasi' => '1',
            'filesize' => '1715974412',
            'path' => 'http://127.0.0.1:8000/images/1715976327_6647b88777ea1.jpg',
            'name' => '1715974413.jpg',
        ]);
        $user = \App\Models\Dokumentasi_foto::factory()->create([
            'id_dokumentasi' => '1',
            'filesize' => '1715974412',
            'path' => 'http://127.0.0.1:8000/images/1715976325_6647b88511c3a.jpg',
            'name' => '1715974414.jpg',
        ]);
        
    }
}
