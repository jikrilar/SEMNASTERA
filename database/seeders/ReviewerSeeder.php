<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reviewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'id' => 5,
            'name' => 'variel',
            'username' => 'variel',
            'email' => 'varie@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'reviewer'
        ]);

        Reviewer::create([
            'id' => 5,
            'mobile_number' => '081996557659',
            'picture' => 'reviewer.jpg',
            'gender' => 'male',
            'user_id' => 5
        ]);

        User::create([
            'id' => 6,
            'name' => 'restu',
            'username' => 'restu',
            'email' => 'restu@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'reviewer'
        ]);

        Reviewer::create([
            'id' => 6,
            'mobile_number' => '081876557659',
            'picture' => 'reviewer.jpg',
            'gender' => 'male',
            'user_id' => 6
        ]);

        User::create([
            'id' => 7,
            'name' => 'nita',
            'username' => 'nita',
            'email' => 'nita@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'reviewer'
        ]);

        Reviewer::create([
            'id' => 7,
            'mobile_number' => '08154637659',
            'picture' => 'reviewer.jpg',
            'gender' => 'female',
            'user_id' => 7
        ]);

        User::create([
            'id' => 8,
            'name' => 'farhan',
            'username' => 'farhan',
            'email' => 'farhan@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'reviewer'
        ]);

        Reviewer::create([
            'id' => 8,
            'mobile_number' => '081996557569',
            'picture' => 'reviewer.jpg',
            'gender' => 'male',
            'user_id' => 8
        ]);
    }
}
