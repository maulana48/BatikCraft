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
        $product_category_images = ['img/product_category/batik_pria.jpg', 'img/product_category/batik_wanita.jpg', 'img/product_category/batik_anak.jpg', 'img/product_category/batik_couple.jpg', 'img/product_category/batik_keluarga.jpg', 'img/product_category/batik_kain.jpg'];

        $products_images = ['img/products/batik_pria.jpg', 'img/products/batik_wanita.jpg', 'img/products/batik_anak.jpg', 'img/products/batik_couple.jpg', 'img/products/batik_keluarga.jpg', 'img/products/batik_kain.jpg'];

        $product_review_images = ['img/product_review/batik_pria.jpg', 'img/product_review/batik_wanita.jpg', 'img/product_review/batik_anak.jpg', 'img/product_review/batik_couple.jpg', 'img/product_review/batik_keluarga.jpg', 'img/product_review/batik_kain.jpg'];

        $user_images = ['img/user/batik_pria.jpg', 'img/user/batik_wanita.jpg', 'img/user/batik_anak.jpg', 'img/user/batik_couple.jpg', 'img/user/batik_keluarga.jpg', 'img/user/batik_kain.jpg'];

        $resources = array_merge($product_category_images, $products_images, $product_review_images, $user_images);
        $randomImage = $this->faker->randomElement($resources);

        $image = pathinfo($randomImage, PATHINFO_FILENAME);
        $image_extensions = pathinfo($randomImage, PATHINFO_EXTENSION);

        return [
            'entity_id' => $this->faker->numberBetween($min = 1, $max = 15),
            'entity_name' => $this->faker->randomElement(['product_category', 'products', 'product_review', 'user']),
            'file' => $image,
            'extension' => $image_extensions,
        ];
    }
}
