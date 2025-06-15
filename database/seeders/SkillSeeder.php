<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill; 


class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Skill::insert([
            ['name' => 'PHP', 'icon' => 'fab fa-php', 'level' => 90],
            ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'level' => 85],
            ['name' => 'JavaScript', 'icon' => 'fab fa-js', 'level' => 80],
            ['name' => 'HTML/CSS', 'icon' => 'fab fa-html5', 'level' => 95],
            ['name' => 'MySQL', 'icon' => 'fas fa-database', 'level' => 75],
            ['name' => 'Git', 'icon' => 'fab fa-git-alt', 'level' => 70],
            ['name' => 'Vue.js', 'icon' => 'fab fa-vuejs', 'level' => 65],
            ['name' => 'Docker', 'icon' => 'fab fa-docker', 'level' => 60],
        ]);
    }
}
