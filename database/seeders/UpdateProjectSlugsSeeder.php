<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class UpdateProjectSlugsSeeder extends Seeder
{
    public function run(): void
    {
        Project::all()->each(function ($project) {
            $project->slug = Str::slug($project->title);
            $project->save();
        });

        $this->command->info('Slugs générés pour tous les projets.');
    }
}
