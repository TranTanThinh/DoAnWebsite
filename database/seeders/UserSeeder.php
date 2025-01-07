<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'userType' => 'customer',
                'phone' => '0123456789',
                'firstName' => 'John',
                'lastName' => 'Doe',
                'dayOfBirth' => '1990-01-01',
                'sex' => 'male',
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ]
        ]);
    }
}
