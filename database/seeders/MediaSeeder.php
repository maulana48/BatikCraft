<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // id	INTEGER	NO	NULL	
        // parent_id	INTEGER	
        // parent_type	varchar	
        // file	varchar	
        // extension	varchar	
        // created_at	datetime
        // updated_at	datetime

        $products_images = ['img/Product/daster_belang.jpeg', 'img/Product/daster_garis.jpeg', 'img/Product/daster_merah.jpeg', 'img/Product/daster_merah_muda.jpeg', 'img/Product/daster_pola.jpeg', 'img/Product/daster_belang.jpeg', 'img/Product/daster_garis.jpeg', 'img/Product/daster_merah.jpeg', 'img/Product/daster_merah_muda.jpeg', 'img/Product/daster_pola.jpeg', 'img/Product/daster_belang.jpeg', 'img/Product/daster_garis.jpeg', 'img/Product/daster_merah.jpeg', 'img/Product/daster_merah_muda.jpeg', 'img/Product/daster_pola.jpeg', 'img/Product/daster_belang.jpeg', 'img/Product/daster_garis.jpeg', 'img/Product/daster_merah.jpeg', 'img/Product/daster_merah_muda.jpeg', 'img/Product/test/daster_pola.jpeg'];

        for ($i = 0; $i < count($products_images); $i++) {
            // get random index
            $randInt = rand(0, count($products_images) - 1);
            $value = $products_images[$randInt];

            Media::create([
                'parent_id' => $randInt,
                'parent_type' => 'products',
                'file' => pathinfo($value, PATHINFO_DIRNAME) . '/' . pathinfo($value, PATHINFO_FILENAME),
                'extension' => pathinfo($value, PATHINFO_EXTENSION),
            ]);
        }

        for ($i = 0; $i < count($products_images); $i++) {
            // get random index
            $randInt = rand(0, count($products_images) - 1);
            $value = $products_images[$randInt];

            Media::create([
                'parent_id' => $randInt,
                'parent_type' => 'products',
                'file' => pathinfo($value, PATHINFO_DIRNAME) . '/' . pathinfo($value, PATHINFO_FILENAME),
                'extension' => pathinfo($value, PATHINFO_EXTENSION),
            ]);
        }
    }
}
