<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{ Hash };

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->create([
        //         'name' => 'Test User',
        //         'gender' => 'M',
        //         'email' => 'test@example.com',
        //         'password' => Hash::make('test'),
        //         'alamat' => 'test',
        //         'no_telepon' => '08023497502',
        //         'tanggal_lahir' => '2004--01-01'
        //     ]);

        \App\Models\User::factory(5)->create();
        \App\Models\KategoriProduct::factory(3)->create();
        \App\Models\Keranjang::factory(5)->create();
        \App\Models\Pembayaran::factory(6)->create();
        \App\Models\Pemesanan::factory(6)->create();
        \App\Models\ProductPesanan::factory(20)->create();
        \App\Models\PemesananKeranjang::factory(6)->create();
        \App\Models\ProductBatik::factory(20)->create();
        \App\Models\ProductKeranjang::factory(10)->create();
        \App\Models\ReviewProduct::factory(10)->create();
        //  \App\Models\Media::factory(20)->create();
    }
}
