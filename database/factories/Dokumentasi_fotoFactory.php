<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokumentasi_foto>
 */
class Dokumentasi_fotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id_dokumentasi" => $this->faker->randomNumber(),
            "filesize" => $this->faker->word(),
            "path" => $this->faker->word(),
            "name" => $this->faker->word(),
        ];
    }
}
