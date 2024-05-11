<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween($min = 1, $max = 20),
            'order_id' => $this->faker->numberBetween($min = 1, $max = 6),
            'amount' => $this->faker->numberBetween($min = 1, $max = 20),
        ];
    }
}
