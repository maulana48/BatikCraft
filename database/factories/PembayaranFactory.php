<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $total_biaya = $this->faker->randomElement([100000, 200000, 250000, 400000, 120000]);
        return [
            'pemesanan_id' => $this->faker->numberBetween($min = 1, $max = 6),
            'no_pembayaran' => mt_rand(1, 100000),
            'total_biaya' => $total_biaya,
            'jumlah_yang_dibayar' => $total_biaya,
            'metode' => $this->faker->sentence(mt_rand(1, 4)),
            'status' => mt_rand(1, 3),
        ];
    }
}
