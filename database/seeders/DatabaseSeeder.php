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
        // User::factory(10)->create();
        \App\Models\User::factory(5)->create(); // only if you don't already have users

        $this->call([
            FarmSeeder::class,
            CropSeeder::class,
        ]);
        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'role' => 'admin',
        //     'country' => 'Algeria'
        // ]);
    }
}
