<?php

namespace Database\Seeders;

use App\Models\Archive;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Archive::create([
            'volume' => 'vol 1',
            'publish_year' => '2022',
            'agenda_id' => 1
        ]);
    }
}
