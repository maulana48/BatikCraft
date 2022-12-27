<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriProduct>
 */
class KategoriProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->sentence(mt_rand(1, 3)),
            'deskripsi' => $this->faker->sentence(mt_rand(5, 8))
        ];
    }
}
