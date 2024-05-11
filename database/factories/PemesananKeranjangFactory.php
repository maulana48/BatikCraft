<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemesananKeranjang>
 */
class PemesananKeranjangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'keranjang_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'pemesanan_id' => $this->faker->numberBetween($min = 1, $max = 6)
        ];
    }
}
