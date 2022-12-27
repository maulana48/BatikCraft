<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 10),
            'room_id' => mt_rand(1, 3),
            'check-in_date' => $this->faker->dateTime(),
            'check-out_date' => $this->faker->dateTime(),
            'total_rooms' => mt_rand(1, 3),
            'payment_details' => $this->faker->sentence(mt_rand(5, 8))
        ];
    }
}
