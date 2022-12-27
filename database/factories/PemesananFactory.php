<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class PemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'total_harga' => $this->faker->randomElement([100000, 200000, 250000, 400000, 120000]),
            'alamat_pengiriman' => $this->faker->address(),
            'metode_pengiriman' => $this->faker->sentence(mt_rand(1, 4)),
            'estimasi_waktu' => $this->faker->dateTime()
        ];
    }
}
