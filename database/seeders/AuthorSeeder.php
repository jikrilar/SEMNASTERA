<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'id' => 2,
            'name' => 'Ardi Pamungkas',
            'username' => 'ardi',
            'email' => 'ardi@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'author',
            'status' => 'active'
        ]);

        Author::create([
            'id' => 2,
            'institution' => 'Politeknik Sukabumi',
            'mobile_number' => '081996957657',
            'picture' => 'author.jpg',
            'gender' => 'male',
            'user_id' => 2,
            'cost_id' => 3
        ]);

        User::create([
            'id' => 3,
            'name' => 'Piqie Julian Pamungkas',
            'username' => 'piqie',
            'email' => 'piqie@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'author',
            'status' => 'active'
        ]);

        Author::create([
            'id' => 3,
            'institution' => 'Politeknik Sukabumi',
            'mobile_number' => '081296957680',
            'picture' => 'author.jpg',
            'gender' => 'male',
            'user_id' => 3,
            'cost_id' => 3
        ]);

        User::create([
            'id' => 4,
            'name' => 'Haikal Mulya Putra',
            'username' => 'haikal',
            'email' => 'haikal@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'author',
            'status' => 'active'
        ]);

        Author::create([
            'id' => 4,
            'institution' => 'Politeknik Sukabumi',
            'mobile_number' => '081996557659',
            'picture' => 'author.jpg',
            'gender' => 'male',
            'user_id' => 4,
            'cost_id' => 3
        ]);
    }
}
