<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{Hash};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'gender' => 'M',
            'email' => 'oyote@root.com',
            'password' => 'test',
            'address' => 'Jl. Kebon Jeruk No. 1',
            'phone_number' => '085640950627',
            'birth_date' => '2004-11-23',
            'role' => 1,
            'remember_token' => Str::random(10),
            'profile_picture' => 'img/error.png'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'User baru',
            'gender' => 'M',
            'email' => 'userbaru@gmail.com',
            'password' => 'userbaru',
            'address' => 'Jl. Kebon Jeruk No. 22',
            'phone_number' => '111111111111',
            'birth_date' => '2000-01-01',
            'role' => 2,
            'remember_token' => Str::random(10),
            'profile_picture' => 'img/error.png'
        ]);

        $this->call([
            MediaSeeder::class,
        ]);


        \App\Models\User::factory(4)->create();
        \App\Models\ProductCategory::factory(3)->create();
        \App\Models\Cart::factory(5)->create();
        \App\Models\Payment::factory(6)->create();
        \App\Models\Order::factory(6)->create();
        \App\Models\OrderProduct::factory(20)->create();
        \App\Models\CartOrder::factory(6)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\CartProduct::factory(10)->create();
        \App\Models\ProductReview::factory(10)->create();
        \App\Models\Media::factory(20)->create();
    }
}
