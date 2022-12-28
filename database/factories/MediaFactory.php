<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'entitas_id' => $this->faker->numberBetween($min = 1, $max = 15),
            'nama_entitas' => $this->faker->randomElement(['KategoriProduct', 'Pembayaran', 'ReviewProduct', 'User']),
            'file' => 'img/error.png',   // $this->faker->name(),
            'ekstensi' => 'png',     // $this->faker->randomElement(['jpg', 'png', 'svg', 'jpeg']),
        ];
    }
}
