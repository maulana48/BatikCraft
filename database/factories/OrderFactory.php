<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'total_amount' => $this->faker->randomElement([100000, 200000, 250000, 400000, 120000]),
            'shipping_address' => $this->faker->address(),
            'shipping_method' => $this->faker->sentence(mt_rand(1, 4)),
            'order_timestamp' => $this->faker->dateTime(),
            'estimated_delivery_timestamp' => $this->faker->dateTime(),
            'status' => mt_rand(1, 2)
        ];
    }
}
