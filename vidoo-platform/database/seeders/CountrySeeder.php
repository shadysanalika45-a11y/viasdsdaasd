<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'مصر', 'code' => 'EG', 'key' => '20', 'currency_id' => 1, 'active' => true],
            ['name' => 'المملكة العربية السعودية', 'code' => 'SA', 'key' => '966', 'currency_id' => 2, 'active' => true],
            ['name' => 'الإمارات العربية المتحدة', 'code' => 'AE', 'key' => '971', 'currency_id' => 3, 'active' => true],
            ['name' => 'الكويت', 'code' => 'KW', 'key' => '965', 'currency_id' => 1, 'active' => false],
            ['name' => 'قطر', 'code' => 'QA', 'key' => '974', 'currency_id' => 1, 'active' => false],
            ['name' => 'البحرين', 'code' => 'BH', 'key' => '973', 'currency_id' => 1, 'active' => false],
            ['name' => 'سلطنة عُمان', 'code' => 'OM', 'key' => '968', 'currency_id' => 1, 'active' => false],
            ['name' => 'العراق', 'code' => 'IQ', 'key' => '964', 'currency_id' => 1, 'active' => false],
            ['name' => 'سوريا', 'code' => 'SY', 'key' => '963', 'currency_id' => 1, 'active' => false],
            ['name' => 'الأردن', 'code' => 'JO', 'key' => '962', 'currency_id' => 4, 'active' => true],
            ['name' => 'لبنان', 'code' => 'LB', 'key' => '961', 'currency_id' => 1, 'active' => false],
            ['name' => 'فلسطين', 'code' => 'PS', 'key' => '970', 'currency_id' => 1, 'active' => false],
            ['name' => 'اليمن', 'code' => 'YE', 'key' => '967', 'currency_id' => 1, 'active' => false],
            ['name' => 'ليبيا', 'code' => 'LY', 'key' => '218', 'currency_id' => 1, 'active' => false],
            ['name' => 'السودان', 'code' => 'SD', 'key' => '249', 'currency_id' => 1, 'active' => false],
            ['name' => 'الجزائر', 'code' => 'DZ', 'key' => '213', 'currency_id' => 1, 'active' => false],
            ['name' => 'المغرب', 'code' => 'MA', 'key' => '212', 'currency_id' => 1, 'active' => false],
            ['name' => 'تونس', 'code' => 'TN', 'key' => '216', 'currency_id' => 1, 'active' => false],
            ['name' => 'موريتانيا', 'code' => 'MR', 'key' => '222', 'currency_id' => 1, 'active' => false],
            ['name' => 'جيبوتي', 'code' => 'DJ', 'key' => '253', 'currency_id' => 1, 'active' => false],
            ['name' => 'الصومال', 'code' => 'SO', 'key' => '252', 'currency_id' => 1, 'active' => false],
            ['name' => 'جزر القمر', 'code' => 'KM', 'key' => '269', 'currency_id' => 1, 'active' => false],
        ];

        foreach ($countries as $country) {
            \App\Models\Country::create($country);
        }
    }
}
