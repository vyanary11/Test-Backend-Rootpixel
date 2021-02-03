<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'        => 'Admin',
            'last_name'         => 'Root Pixel',
            'email'             => 'admin@rootpixel.com',
            'password'          => Hash::make("123456"),
            'profile_picture'   => "default.jpg"
        ]);
    }
}
