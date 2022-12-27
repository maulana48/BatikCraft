<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hotel_id' => mt_rand(1, 5),
            'room_type' => mt_rand(1, 3),
            'capacity' => mt_rand(1, 5),
            'description' => $this->faker->sentence(mt_rand(5, 8))
        ];
    }
}
