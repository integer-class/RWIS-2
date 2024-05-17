<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

                $this->call(Rt::class);
                $this->call(KartuKeluarga::class);
            $this->call(Penduduk::class);
            $this->call(UserSeeder::class);
            $this->call(KategoriKomplain::class);
            $this->call(Komplain::class);
            $this->call(Dokumentasi::class);
            $this->call(Dokumentasi_foto::class);

             
           
    }
}
