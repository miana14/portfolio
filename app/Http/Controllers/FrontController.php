<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;
use App\Models\Skill;


class FrontController extends Controller
{
    public function portfolio()
    {
        $services = Service::all();
        $projects = Project::all();
        $skills = Skill::all();

        return view('home', compact('services', 'projects', 'skills'));
    }

    public function show($slug)
    {
    $project = Project::where('slug', $slug)->firstOrFail();

    return view('project.show', compact('project'));
    }

}
