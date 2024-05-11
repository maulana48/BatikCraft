<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartOrder>
 */
class CartOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'cart_id' => $this->faker->numberBetween($min = 1, $max = 6)
        ];
    }
}
