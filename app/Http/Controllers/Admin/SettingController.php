<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Données simulées pour les paramètres du site (peuvent être remplacées par une DB plus tard)
    private array $defaultSettings = [
        'site_title' => 'MonPortfolio',
        'favicon' => 'favicon.ico',
        'seo_keywords' => 'portfolio, développeur web',
        'footer_text' => '© 2025 MonPortfolio. Tous droits réservés.',
    ];

    /**
     * Affiche la page des paramètres du site
     */
    public function index()
    {
        $settings = $this->defaultSettings;

        // Exemple d'intégration de compteurs (messages non lus, etc.)
        $unreadMessagesCount = 3;

        return view('admin.settings.index', compact('settings', 'unreadMessagesCount'));
    }

    /**
     * Traite la mise à jour des paramètres (simulée ici)
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_title'    => 'required|string|max:255',
            'favicon'       => 'nullable|string|max:255',
            'seo_keywords'  => 'nullable|string|max:255',
            'footer_text'   => 'nullable|string|max:255',
        ]);

        // Simulation de sauvegarde en base ou fichier
        // Exemple : Setting::updateMany($validated);

        return redirect()->route('admin.settings')->with('success', 'Paramètres mis à jour avec succès !');
    }
}
