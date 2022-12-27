<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'booking_id' => $this->faker->unique()->numberBetween($min = 1, $max = 10),
            'user_id' => mt_rand(1, 10),
            'title' => $this->faker->sentence(mt_rand(3, 8)),
            'rating' => mt_rand(1, 5),
            'description' => $this->faker->sentence(mt_rand(5, 8))
        ];
    }
}
