<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function portfolio()
{
    $projects = \App\Models\Project::where('status', 'Publié')->latest()->get();
    return view('home', compact('projects'));
}
}
