<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengumuman_rt>
 */
class Pengumuman_rtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pengumuman' => $this->faker->sentence,
            'id_rt' => $this->faker->paragraph,
        ];
    }
}
