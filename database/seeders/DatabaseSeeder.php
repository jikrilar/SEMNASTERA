<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AgendaSeeder::class);

        $this->call(CostSeeder::class);

        $this->call(AuthorSeeder::class);

        $this->call(AdminSeeder::class);

        $this->call(ReviewerSeeder::class);

        $this->call(ArchiveSeeder::class);

        $this->call(PaperSeeder::class);
    }
}
