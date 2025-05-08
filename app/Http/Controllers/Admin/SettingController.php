<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Données en dur pour les paramètres
    private $settings = [
        'site_name' => 'MonPortfolio',
        'site_description' => 'Portfolio personnel de développement web',
        'contact_email' => 'contact@monportfolio.com',
        'footer_text' => '© 2023 MonPortfolio. Tous droits réservés.',
        'theme_color' => 'purple',
        'enable_blog' => true,
        'projects_per_page' => 6,
        'google_analytics_id' => 'UA-XXXXXXXXX-X'
    ];

    /**
     * Affiche la page des paramètres
     */
    public function index()
    {
        $settings = $this->settings;
        $unreadMessagesCount = 3; // Pour la sidebar
        
        return view('admin.settings.index', compact('settings', 'unreadMessagesCount'));
    }

    /**
     * Met à jour les paramètres
     */
    public function update(Request $request)
    {
        // Simuler la mise à jour
        return redirect()->route('admin.settings')
            ->with('success', 'Paramètres mis à jour avec succès!');
    }
}