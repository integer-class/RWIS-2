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

            "id_user" => "3",
            "judul" => $this->faker->sentence(3),
            "deskripsi" => $this->faker->sentence(10),
            "foto" => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
