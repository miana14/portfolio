<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'status' => 'required|string|in:Publié,Brouillon,Archivé',
            'image_url' => 'nullable|url',
            'image_file' => 'nullable|image',
            'date' => 'nullable|date',
        ]);

        // Gestion de l'image
        $validated['image'] = $this->handleImageUpload($request);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'status' => 'required|string|in:Publié,Brouillon,Archivé',
            'image_url' => 'nullable|url',
            'image_file' => 'nullable|image',
            'date' => 'nullable|date',
        ]);

        // Gestion de la nouvelle image
        $newImagePath = $this->handleImageUpload($request);

        if ($newImagePath) {
            // Supprimer l’ancienne image locale uniquement
            if ($project->image && !str_starts_with($project->image, 'http') && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $newImagePath;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        if ($project->image && !str_starts_with($project->image, 'http') && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé.');
    }

    /**
     * Gère l’upload ou l’URL de l’image du projet.
     */
    private function handleImageUpload(Request $request): ?string
    {
        if ($request->hasFile('image_file')) {
            return $request->file('image_file')->store('projects', 'public');
        }

        if ($request->filled('image_url')) {
            return $request->input('image_url');
        }

        return null;
    }
}
