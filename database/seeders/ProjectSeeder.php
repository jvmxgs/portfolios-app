<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory(50)->create();

        $projects = Project::all();

        $projects->each(function ($project) {
            $this->command->info('Seeding image to project ' . $project->id);

            $imageUrl = 'https://source.unsplash.com/random/?website,template,blog';

            $project
                ->addMediaFromUrl($imageUrl)
                ->toMediaCollection('images');
        });
    }
}
