<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projects = [
        [
            'id' => 1,
            'image' => 'https://via.placeholder.com/100x60',
            'title' => 'Projet E-commerce',
            'description' => 'Site web e-commerce',
            'category' => 'Web',
            'date' => '15/04/2023',
            'status' => 'Publié'
        ],
        [
            'id' => 2,
            'image' => 'https://via.placeholder.com/100x60',
            'title' => 'Application Mobile',
            'description' => 'Application de fitness',
            'category' => 'Mobile',
            'date' => '02/03/2023',
            'status' => 'Publié'
        ],
        [
            'id' => 3,
            'image' => 'https://via.placeholder.com/100x60',
            'title' => 'Blog Personnel',
            'description' => 'Blog avec CMS',
            'category' => 'Web',
            'date' => '18/01/2023',
            'status' => 'Brouillon'
        ],
        [
            'id' => 4,
            'image' => 'https://via.placeholder.com/100x60',
            'title' => 'Portfolio Design',
            'description' => 'Design UI/UX',
            'category' => 'Design',
            'date' => '05/12/2022',
            'status' => 'Archivé'
        ]
    ];

    /**
     * Affiche la liste des projets
     */
    public function index()
    {
        $projects = $this->projects;
        $unreadMessagesCount = 3; // Pour la sidebar
        
        return view('admin.projects.index', compact('projects', 'unreadMessagesCount'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        $unreadMessagesCount = 3; // Pour la sidebar
        return view('admin.projects.create', compact('unreadMessagesCount'));
    }

    /**
     * Enregistre un nouveau projet
     */
    public function store(Request $request)
    {
        // Simuler l'enregistrement
        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet créé avec succès!');
    }

    /**
     * Affiche un projet spécifique
     */
    public function show($id)
    {
        $project = $this->findProject($id);
        $unreadMessagesCount = 3; // Pour la sidebar
        
        return view('admin.projects.show', compact('project', 'unreadMessagesCount'));
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit($id)
    {
        $project = $this->findProject($id);
        $unreadMessagesCount = 3; // Pour la sidebar
        
        return view('admin.projects.edit', compact('project', 'unreadMessagesCount'));
    }

    /**
     * Met à jour un projet
     */
    public function update(Request $request, $id)
    {
        // Simuler la mise à jour
        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet mis à jour avec succès!');
    }

    /**
     * Supprime un projet
     */
    public function destroy($id)
    {
        // Simuler la suppression
        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet supprimé avec succès!');
    }

    /**
     * Trouve un projet par son ID
     */
    private function findProject($id)
    {
        foreach ($this->projects as $project) {
            if ($project['id'] == $id) {
                return $project;
            }
        }
        
        abort(404);
    }
}
