<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Komplain>
 */
class KomplainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => $this->faker->unique()->randomNumber(5),
            'judul_komplain' => $this->faker->text(),
            'isi_komplain' => $this->faker->text(),
            'status_komplain' => $this->faker->randomElement(['Diterima', 'Diproses', 'Selesai']),
            'id_kategori_komplain' => $this->faker->randomNumber(4),
        ];
    }
}
