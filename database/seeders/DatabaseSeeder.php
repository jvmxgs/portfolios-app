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
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$bOPHjHelfldli6MjP.N6X.lHGofYkcBScHa17efUNluIyaGfCyC5m'
        ]);

        $this->call([
            ProjectSeeder::class
        ]);
    }
}
