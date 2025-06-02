<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'total' => 1240.00,
                'status' => 'delivered',
                'delivery_address' => '126, Mangas 1, Alfonso, South Luzon, Cavite, 4123',
                'contact_number' => '+63 960 203 5375',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'total' => 800.00,
                'status' => 'processing',
                'delivery_address' => '126, Mangas 1, Alfonso, South Luzon, Cavite, 4123',
                'contact_number' => '+63 960 203 5375',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ],
        ]);
    }
}
