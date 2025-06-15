<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Affiche le formulaire d'édition du profil
     */
    public function edit(Request $request)
{
    $user = $request->user(); // ← Important
    $unreadMessagesCount = 3;

    return view('admin.profile.edit', [
        'user' => $user,
        'unreadMessagesCount' => $unreadMessagesCount,
    ]);
}


    /**
     * Met à jour le profil
     */
    public function update(Request $request)
    {
        $user = $request->user();

        // Validation simple
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        // Mise à jour nom / email
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Si un nouveau mot de passe est fourni
        if (!empty($validated['new_password'])) {
            // Si on souhaite vérifier l'ancien mot de passe
            if (!Hash::check($validated['current_password'], $user->password)) {
                return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
            }

            $user->password = $validated['new_password']; // le cast 'hashed' le cryptera
        }

        $user->save();

        return redirect()->route('admin.profile.edit')
            ->with('status', 'profile-updated');
    }
}
