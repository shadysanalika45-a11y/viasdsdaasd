<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::updateOrCreate(['key' => 'site_name'], ['value' => 'Vidoo']);
        SiteSetting::updateOrCreate(['key' => 'support_email'], ['value' => 'support@example.com']);
    }
}
