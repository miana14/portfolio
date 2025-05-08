<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $projectsCount = Project::count();
        $messagesCount = Message::count();
        $unreadMessagesCount = Message::where('read', false)->count();

        $recentActivities = collect([
            (object)[
                'title' => 'Nouveau projet ajouté',
                'description' => 'Vous avez ajouté le projet "Application Mobile"',
                'time' => 'Il y a 2 heures',
                'icon' => 'plus',
                'color' => 'purple'
            ],
            (object)[
                'title' => 'Nouveau message',
                'description' => 'Vous avez reçu un message de Jean Dupont',
                'time' => 'Il y a 5 heures',
                'icon' => 'envelope',
                'color' => 'blue'
            ],
            (object)[
                'title' => 'Projet modifié',
                'description' => 'Le projet "Portfolio Web" a été mis à jour',
                'time' => 'Hier',
                'icon' => 'edit',
                'color' => 'green'
            ],
            (object)[
                'title' => 'Message lu',
                'description' => 'Vous avez lu un message de Claire Martin',
                'time' => 'Il y a 3 jours',
                'icon' => 'eye',
                'color' => 'gray'
            ],
        ]);

        return view('admin.dashboard.index', compact(
            'projectsCount', 
            'messagesCount', 
            'unreadMessagesCount', 
            'recentActivities'
        ));
    }
}
