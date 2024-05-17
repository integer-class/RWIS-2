<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokumentasi>
 */
class DokumentasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "judul" => $this->faker->sentence(),
            "deskripsi" => $this->faker->paragraph(),
            "tanggal" => $this->faker->date(),
            "kategori" => $this->faker->word(),
            "nik" => $this->faker->randomNumber(),
            "thumbnail" => $this->faker->word(),
        ];
    }
}
