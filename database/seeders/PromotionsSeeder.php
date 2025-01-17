<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promotions')->insert([
            [
                'name' => 'SUMMER20',
                'description' => 'Get 20% off on all summer items!',
                'discountRate' => 20,
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now()->addDays(30),
                'isActive' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'WELCOME10',
                'description' => 'Get 10% off on your first purchase.',
                'discountRate' => 10,
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now()->addDays(15),
                'isActive' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'BLACKFRIDAY50',
                'description' => 'Black Friday special! Get 50% off store-wide.',
                'discountRate' => 50,
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now()->addDays(5),
                'isActive' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'FREESHIP',
                'description' => 'Free shipping on all orders above $50.',
                'discountRate' => 0,
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now()->addDays(20),
                'isActive' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'XMAS25',
                'description' => 'Celebrate Christmas with 25% off on selected items!',
                'discountRate' => 25,
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now()->addDays(40),
                'isActive' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
