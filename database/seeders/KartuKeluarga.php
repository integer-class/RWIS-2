<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KartuKeluarga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\KartuKeluarga::factory(10)->create();
        //buat manual

        \App\Models\KartuKeluarga::factory()->create([
                'nomor_kk' => '472751886',
                'kepalakeluarga' => 'Budi',
                'alamat' => 'Jl. Test No. 1',
                'rt' => '001', // contoh nomor RT
                'rw' => '002', // contoh nomor RW
                'kelurahan' => 'Nama Kelurahan',
                'kecamatan' => 'Nama Kecamatan',
                'kabupaten' => 'Nama Kabupaten',
                'provinsi' => 'Nama Provinsi',
            ]);


            \App\Models\KartuKeluarga::factory()->create([
                'nomor_kk' => '472751887',
                'kepalakeluarga' => 'Budi',
                'alamat' => 'Jl. Test No. 1',
                'rt' => '001', // contoh nomor RT
                'rw' => '002', // contoh nomor RW
                'kelurahan' => 'Nama Kelurahan',
                'kecamatan' => 'Nama Kecamatan',
                'kabupaten' => 'Nama Kabupaten',
                'provinsi' => 'Nama Provinsi',
            ]);



            


    }
}
