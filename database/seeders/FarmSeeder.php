<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farm;
use App\Models\User;

class FarmSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::take(1)->get(); // Get 5 users

        foreach ($users as $user) {
            Farm::create([
                'user_id' => $user->id,
                'name' => 'Farm of ' . $user->name,
                'location' => fake()->city,
                'size' => fake()->randomElement(['10 hectares', '5 hectares', '15 hectares']),
                'status' => fake()->randomElement(['pending', 'approved']),
            ]);
        }
    }
}
