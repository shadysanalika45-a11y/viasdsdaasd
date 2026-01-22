<?php

namespace Database\Seeders;

use App\Models\CmsSection;
use Illuminate\Database\Seeder;

class CmsSectionSeeder extends Seeder
{
    public function run(): void
    {
        CmsSection::updateOrCreate(
            ['page' => 'home', 'slug' => 'hero'],
            [
                'title' => 'Welcome to Vidoo',
                'content' => 'Hero section content goes here.',
                'is_active' => true,
            ]
        );

        CmsSection::updateOrCreate(
            ['page' => 'pricing', 'slug' => 'plans'],
            [
                'title' => 'Pricing Plans',
                'content' => 'Pricing plans content goes here.',
                'is_active' => true,
            ]
        );
    }
}
