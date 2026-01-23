<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'name_ar' => 'الجنيه المصري',
                'name_en' => 'Egyptian Pound',
                'code' => 'EGP',
                'symbol' => 'ج.م',
                'rate_to_usd' => 49.50,
                'active' => true,
            ],
            [
                'name_ar' => 'الريال السعودي',
                'name_en' => 'Saudi Riyal',
                'code' => 'SAR',
                'symbol' => 'ر.س',
                'rate_to_usd' => 3.75,
                'active' => true,
            ],
            [
                'name_ar' => 'الدرهم الإماراتي',
                'name_en' => 'UAE Dirham',
                'code' => 'AED',
                'symbol' => 'د.إ',
                'rate_to_usd' => 3.67,
                'active' => true,
            ],
            [
                'name_ar' => 'الدينار الأردني',
                'name_en' => 'Jordanian Dinar',
                'code' => 'JOD',
                'symbol' => 'د.ا',
                'rate_to_usd' => 0.71,
                'active' => true,
            ],
        ];

        foreach ($currencies as $currency) {
            \App\Models\Currency::create($currency);
        }
    }
}
