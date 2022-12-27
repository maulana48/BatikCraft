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
        \App\Models\User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'gender' => 'M',
                'password' => Hash::make('test'),
                'address' => 'test',
                'city' => 'test'
            ]);

        \App\Models\User::factory(5)->create();
        \App\Models\Hotel::factory(5)->create();
        \App\Models\Room::factory(10)->create();
        \App\Models\Booking::factory(10)->create();
        \App\Models\Review::factory(10)->create();
    }
}
