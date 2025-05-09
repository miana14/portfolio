<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::insert([
            [
                'title' => 'Création de site vitrine',
                'description' => 'Un site simple pour présenter votre activité.',
                'price' => 800,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'title' => 'Développement e-commerce',
                'description' => 'Un site de vente en ligne avec paiement intégré.',
                'price' => 2000,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'title' => 'Refonte graphique',
                'description' => 'Modernisez le design de votre site web.',
                'price' => 1200,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'title' => 'Référencement SEO',
                'description' => 'Optimisation pour les moteurs de recherche.',
                'price' => 600,
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}
