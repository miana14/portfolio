<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'title' => 'Création de site vitrine',
                'description' => 'Développement d’un site web professionnel pour présenter une activité.',
                'price' => 500
            ],
            [
                'title' => 'Développement e-commerce',
                'description' => 'Création d’une boutique en ligne avec paiement sécurisé.',
                'price' => 1200
            ],
            [
                'title' => 'Optimisation SEO',
                'description' => 'Amélioration de la visibilité du site sur les moteurs de recherche.',
                'price' => 300
            ],
            [
                'title' => 'Maintenance mensuelle',
                'description' => 'Support technique, mises à jour et sécurité du site web.',
                'price' => 150
            ],
            [
                'title' => 'Formation CMS',
                'description' => 'Formation à l’utilisation de WordPress ou autre CMS.',
                'price' => 200
            ],
        ]);
    }
}
