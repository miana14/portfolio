<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        ]);

        // Mise à jour simulée
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()->route('admin.profile.edit')
            ->with('status', 'profile-updated');
    }
}
