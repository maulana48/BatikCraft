<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductBatik>
 */
class ProductBatikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kategori_product_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'name' => $this->faker->name(),
            'harga' => $this->faker->randomElement([10000, 20000, 25000, 40000, 12000]),
            'deskripsi' => $this->faker->sentence(mt_rand(1, 4)),
            'tipe_warna' =>  $this->faker->randomElement(['terang', 'gelap', 'biasa']),
            'stok' => mt_rand(5, 100),
            'asal_kota' => $this->faker->city(),
            'motif_batik' => $this->faker->words(3, true),
        ];
    }
}
