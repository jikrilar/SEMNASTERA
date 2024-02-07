<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Agenda::create([
            'id' => 1,
            'date' => '2023-12-03',
            'poster' => 'poster2023.jpg',
            'status' => 'occur'
        ]);
    }
}
