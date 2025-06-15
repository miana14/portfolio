<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Refonte site vitrine pour entreprise locale',
                'description' => 'Refonte complète d’un site vitrine avec WordPress, responsive design et optimisation SEO.',
                'image' => 'projects/site-vitrine.png',
                'category' => 'Site vitrine',
                'date' => '2024-10-15',
                'status' => 'Terminé',
            ],
            [
                'title' => 'Développement boutique en ligne Laravel',
                'description' => 'Création d’un site e-commerce complet avec gestion des produits, panier et paiement sécurisé.',
                'image' => 'projects/ecommerce-laravel.jpg',
                'category' => 'E-commerce',
                'date' => '2024-8-15',
                'status' => 'En cours',
            ],
            [
                'title' => 'Intranet d’entreprise avec gestion des utilisateurs',
                'description' => 'Application web interne pour la gestion des documents, profils et rôles des employés.',
                'image' => 'projects/intranet.jpg',
                'category' => 'Application métier',
                'date' => '2024-3-15',
                'status' => 'Terminé',
            ],
        ];

        foreach ($projects as $project) {
            Project::create([
                'title' => $project['title'],
                'description' => $project['description'],
                'image' => $project['image'],
                'category' => $project['category'],
                'status' => $project['status'],
                'slug' => Str::slug($project['title']),
            ]);
        }
    }
}
