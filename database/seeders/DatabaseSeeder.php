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
            'name' => 'Jhon Doe',
            'email' => 'jhon@example.com',
            'password' => '$2y$10$bOPHjHelfldli6MjP.N6X.lHGofYkcBScHa17efUNluIyaGfCyC5m' // secret
        ]);


        User::factory(4)->create();

        $users = User::all();

        $users->each(function ($user) {
            $this->command->info('Seeding avatar to user ' . $user->id);

            $imageUrl = 'https://i.pravatar.cc/300';

            $user
                ->addMediaFromUrl($imageUrl)
                ->toMediaCollection('avatar');
        });

        $this->call([
            ProjectSeeder::class
        ]);
    }
}
