<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => $this->faker->unique()->randomNumber(9),
            'nama' => $this->faker->name(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'alamat' => $this->faker->address(),
            'golong_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']),
            'status_perkawinan' => $this->faker->randomElement(['Kawin', 'Belum Kawin', 'Cerai']),
            'pekerjaan' => $this->faker->jobTitle(),
            'kewarganegaraan' => $this->faker->randomElement(['WNI', 'WNA']),
            'nomor_kk' => $this->faker->unique()->randomNumber(9),
        ];
    }
}
