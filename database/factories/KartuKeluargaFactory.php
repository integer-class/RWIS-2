<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KartuKeluarga>
 */
class KartuKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_kk' => $this->faker->unique()->randomNumber(9),
            'alamat' => $this->faker->address(),
            'rt' => $this->faker->randomNumber(3),
            'rw' => $this->faker->randomNumber(3),
            'kelurahan' => $this->faker->city(),
            'kecamatan' => $this->faker->city(),
            'kabupaten' => $this->faker->city(),
            'provinsi' => $this->faker->state(),
        ];
    }
}
