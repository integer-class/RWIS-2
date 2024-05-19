<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanRt extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Pengumuman_rt::factory(3)->create();

        \App\Models\Pengumuman_rt::factory()->create([
            'id_pengumuman' => '9318SW',
            'id_rt' => '2',
            'updated_at' => '2024-12-06',
            
        ]);
    }
}
