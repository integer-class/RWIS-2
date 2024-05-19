<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengumuman>
 */
class PengumumanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'isi_pengumuman' => $this->faker->paragraph,
            'foto' => 'default.jpg',
            'tanggal_pengumuman' => $this->faker->date(),
            'kepentingan' => $this->faker->randomElement(['penting', 'tidak penting', 'biasa']),

        ];
    }
}
