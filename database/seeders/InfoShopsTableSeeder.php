<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class InfoShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('info_shops')->insert([
            [
                'shopName' => 'Grocery Store',
                'email' => 'grocerystore@gmail.com',
                'phone' => '0394480854',
                'address' => '3/2 Street, Ward 12, District 10, Ho Chi Minh City',
                'facebook' => 'https://www.facebook.com/grocerystore',
                'instagram' => 'https://www.instagram.com/grocerystore',
                'twitter' => 'https://twitter.com/grocerystore',
                'describe' => 'Grocery Store is a grocery store that sells fresh food, fruits, vegetables, and more.',
                'created_at' => now(),
                'updated_at' => now(),
            ],  
        ]);
    }
}
