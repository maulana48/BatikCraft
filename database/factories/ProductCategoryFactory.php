<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Batik Pria', 'Batik Wanita', 'Batik Anak', 'Batik Couple', 'Batik Keluarga', 'Batik Kain']),
            'description' => $this->faker->sentence(mt_rand(5, 8)),
        ];
    }
}
