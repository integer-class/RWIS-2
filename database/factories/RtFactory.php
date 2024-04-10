<?php

namespace Database\Factories;

use App\Models\Rt;
use Illuminate\Database\Eloquent\Factories\Factory;

class RtFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //buat rt id urut dari 1-10
        $rtNumber = $this->faker->unique()->numberBetween(1, 10);
        $rtName = "RT " . str_pad($rtNumber, 2, '0', STR_PAD_LEFT);

        return [
            'id_rt' => $rtNumber,
            'nama_rt' => $rtName
        ];
    }
}
