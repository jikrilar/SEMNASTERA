<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'id' => 1,
            'name' => 'Muhamad Jikril Aryanda',
            'username' => 'jikril',
            'email' => 'jikril@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        Admin::create([
            'id' => 1,
            'mobile_number' => '081996947680',
            'gender' => 'male',
            'picture' => 'admin.jpg',
            'user_id' => 1
        ]);
    }
}
