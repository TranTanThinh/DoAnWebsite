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
            ],
            [
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Admin123456'),
                'role' => 'admin',
                'phone' => '0123456789',
                'firstName' => 'Admin',
                'lastName' => 'AdminWebsite',
                'dayOfBirth' => '1990-01-01 00:00:00',
                'sex' => 'Male',
                'image' => 'default-avatar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'trantanthinh@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Thinh123456'),
                'role' => 'user',
                'phone' => '0987654321',
                'firstName' => 'Thinh',
                'lastName' => 'Tran',
                'dayOfBirth' => '2004-05-15 00:00:00',
                'sex' => 'Male',
                'image' => 'default-avatar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
