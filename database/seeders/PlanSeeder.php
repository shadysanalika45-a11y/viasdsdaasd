<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::updateOrCreate(
            ['name' => 'Starter'],
            [
                'price' => 19.00,
                'interval' => 'monthly',
                'features' => ['Basic listing', 'Email support'],
                'is_active' => true,
            ]
        );

        Plan::updateOrCreate(
            ['name' => 'Pro'],
            [
                'price' => 49.00,
                'interval' => 'monthly',
                'features' => ['Priority listing', 'Priority support'],
                'is_active' => true,
            ]
        );
    }
}
