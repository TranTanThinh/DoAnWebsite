<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['categoryId' => 1 ,'name'=> 'Bell Pepper', 'image' => 'product-1.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'bell-pepper', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2 ,'name'=> 'Strawberry', 'image' => 'product-2.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'strawberry', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 1 ,'name'=> 'Green Beans', 'image' => 'product-3.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'green-beans', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 1 ,'name'=> 'Purple Cabbage', 'image' => 'product-4.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'purple-cabbage', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 1 ,'name'=> 'Tomato', 'image' => 'product-5.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'tomato', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 1 ,'name'=> 'Brocolli', 'image' => 'product-6.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'brocolli', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 1 ,'name'=> 'Carrots', 'image' => 'product-7.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'carrots', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 1 ,'name'=> 'Onion', 'image' => 'product-9.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'onion', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2 ,'name'=> 'Apple', 'image' => 'product-10.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'apple', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 1 ,'name'=> 'Garlic', 'image' => 'product-11.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'garlic', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 1 ,'name'=> 'Chilli', 'image' => 'product-12.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'chilli', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2 ,'name'=> 'Bơ', 'image' => 'product-13.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'bo', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2 ,'name'=> 'Chuối', 'image' => 'product-14.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'chuoi', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2 ,'name'=> 'Đu Đủ', 'image' => 'product-15.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'du-du', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2 ,'name'=> 'Mãn Cầu', 'image' => 'product-16.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'man-cau', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2 ,'name'=> 'Thanh Long', 'image' => 'product-17.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'thanh-long', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2 ,'name'=> 'Chôm Chôm', 'image' => 'product-18.jpg', 'description' => 'No description', 'price' => 120000, 'slug' => 'chom-chom', 'created_at' => Carbon::now('Asia/Ho_Chi_Minh'), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')],
        ]);
    }
}
