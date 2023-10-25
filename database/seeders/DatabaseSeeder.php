<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$bOPHjHelfldli6MjP.N6X.lHGofYkcBScHa17efUNluIyaGfCyC5m' // secret
        ]);

        $user = User::first();

        $user
            ->addMediaFromUrl('https://i.pravatar.cc/300')
            ->toMediaCollection('avatar');

        $this->call([
            ProjectSeeder::class
        ]);
    }
}
