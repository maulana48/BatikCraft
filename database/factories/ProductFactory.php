<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_category_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'name' => $this->faker->sentence(mt_rand(1, 4)),
            'merch' => $this->faker->randomElement(['batik', 'songket', 'tenun']),
            'price' => $this->faker->randomElement([10000, 20000, 25000, 40000, 12000]),
            'description' => $this->faker->sentence(mt_rand(1, 4)),
            'color_type' => $this->faker->randomElement(['terang', 'gelap', 'biasa']),
            'stock' => mt_rand(5, 100),
            'city_origin' => $this->faker->city(),
            'batik_motif' => $this->faker->words(3, true),
        ];
    }
}
