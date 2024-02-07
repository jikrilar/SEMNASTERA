<?php

namespace Database\Seeders;

use App\Models\Cost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cost::create([
            'category' => 'Dosen',
            'nominal' => '200000',
            'earlybird_nominal' => '150000',
        ]);

        Cost::create([
            'category' => 'Umum',
            'nominal' => '150000',
            'earlybird_nominal' => '100000',
        ]);

        Cost::create([
            'category' => 'Mahasiswa',
            'nominal' => '100000',
            'earlybird_nominal' => '75000',
        ]);

        Cost::create([
            'category' => 'Non Pemakalah',
            'nominal' => '250000',
            'earlybird_nominal' => '200000',
        ]);
    }
}
