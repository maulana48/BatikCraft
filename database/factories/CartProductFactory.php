<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartProduct>
 */
class CartProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'cart_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'amount' => mt_rand(5, 100),
            'status' => mt_rand(1, 3)
        ];
    }
}
