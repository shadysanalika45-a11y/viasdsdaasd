<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        PaymentMethod::updateOrCreate(
            ['name' => 'Manual Bank Transfer'],
            [
                'type' => 'manual',
                'instructions' => 'Send payment to our bank account and upload the receipt.',
                'is_active' => true,
            ]
        );
    }
}
