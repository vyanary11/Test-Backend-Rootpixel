<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
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
        $user = User::create([
            'email' => 'vyanaryprabowo9763@gmail.com',
            'password' => Hash::make("vyanary11"),
            'level_user' => 'admin',
        ]);

        Admin::create([
            'user_id'       => $user->id,
            'first_name'    => 'Vyan',
            'last_name'     => 'Ary Pratama',
            'phone'         => '081556780810',
            'Address'       => 'Dsn Gunung Remuk RT 002 / RW 004 No. 124'
        ]);

        $user = User::create([
            'email' => 'vyanary97@gmail.com',
            'password' => Hash::make("vyanary11"),
            'level_user' => 'member',
        ]);

        Customer::create([
            'user_id'       => $user->id,
            'first_name'    => 'Vyan',
            'last_name'     => 'Ary Pratama',
            'phone'         => '081556780810',
            'Address'       => 'Dsn Gunung Remuk RT 002 / RW 004 No. 124'
        ]);
    }
}
