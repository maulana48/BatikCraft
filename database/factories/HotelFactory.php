<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        return [
            'name' => $name,
            'slug' => $slug,
            'address' => $this->faker->address(),
            'tel_number' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
            'price' => $this->faker->randomElement([100000, 200000, 250000, 400000, 120000]),
            'description' => $this->faker->sentence(mt_rand(5, 8))
        ];
    }
}
