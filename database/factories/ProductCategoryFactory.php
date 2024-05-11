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
        $product_category_images = ['img/product_category/batik_pria.jpg', 'img/product_category/batik_wanita.jpg', 'img/product_category/batik_anak.jpg', 'img/product_category/batik_couple.jpg', 'img/product_category/batik_keluarga.jpg', 'img/product_category/batik_kain.jpg'];

        $resources = array_merge($product_category_images);
        $randomImage = $this->faker->randomElement($resources);

        $image = pathinfo($randomImage, PATHINFO_FILENAME);

        return [
            'name' => $this->faker->randomElement(['Batik Pria', 'Batik Wanita', 'Batik Anak', 'Batik Couple', 'Batik Keluarga', 'Batik Kain']),
            'deskripsi' => $this->faker->sentence(mt_rand(5, 8)),
            'media' => $image,
        ];
    }
}
