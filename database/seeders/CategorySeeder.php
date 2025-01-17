<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['categoryId' => 1, 'name' => 'Rau Củ Quả', 'slug' => 'rau-cu-qua', 'parent_id' => null, 'created_at' => now('Asia/Ho_Chi_Minh'), 'updated_at' => now('Asia/Ho_Chi_Minh')],
            ['categoryId' => 2, 'name' => 'Trái Cây', 'slug' => 'trai-cay', 'parent_id' => null, 'created_at' => now('Asia/Ho_Chi_Minh'), 'updated_at' => now('Asia/Ho_Chi_Minh')],
        ]);
    }
}
