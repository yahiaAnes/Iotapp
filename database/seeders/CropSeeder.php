<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crops;
use App\Models\Farm;
use App\Models\User;
use Illuminate\Support\Carbon;

class CropSeeder extends Seeder
{
    public function run(): void
    {
        $farms = Farm::with('user')->get();

        foreach ($farms as $farm) {
            Crops::create([
                'farm_id' => $farm->id,
                'user_id' => $farm->user_id,
                'name' => fake()->randomElement(['Wheat', 'Corn', 'Rice', 'Tomato']),
                'planting_date' => Carbon::now()->subDays(rand(10, 100)),
                'harvest_date' => rand(0, 1) ? Carbon::now()->addDays(rand(30, 90)) : null,
                'fertilizers_used' => rand(0, 1) ? 'NPK, Urea' : null,
                'isBlockchain' => false,
                'status' => fake()->randomElement(['draft', 'pending', 'approved', 'rejected', 'stored']),
            ]);
        }
    }
}
