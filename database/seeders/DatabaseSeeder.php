<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Create 5 random users
        \App\Models\User::factory(5)->create();

        // Create a specific admin user
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'country' => 'Algeria',
            'password' => bcrypt('password'), // set a known password
        ]);

        // Call other seeders
        $this->call([
            FarmSeeder::class,
            CropSeeder::class,
        ]);
    }
}
