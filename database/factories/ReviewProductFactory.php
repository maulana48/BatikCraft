<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewProduct>
 */
class ReviewProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'product_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'judul' => $this->faker->sentence(mt_rand(3, 8)),
            'komentar' => $this->faker->sentence(mt_rand(5, 20)),
            'rating' => mt_rand(1, 5)
        ];
    }
}
