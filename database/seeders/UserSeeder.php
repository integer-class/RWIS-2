<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(9)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Uzi',
            'id_rt' => '1',
            'nik' => '1234567890123456',
            'password' => Hash::make('password'),
            'role' => '1',
        ]);
    }
}
