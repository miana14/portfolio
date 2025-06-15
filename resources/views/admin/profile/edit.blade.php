@extends('admin.layouts.app')

@section('title', 'Profil administrateur')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Mon profil</h2>

    @if(session('status') === 'profile-updated')
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            Profil mis à jour avec succès !
        </div>
    @endif

    @if(isset($user))
    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        @method('PUT')

        <!-- Nom -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required autofocus
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
            @error('name')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
            @error('email')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Modification du mot de passe -->
        <hr class="my-6">

        <h3 class="text-lg font-semibold text-gray-700 mb-4">Changer le mot de passe</h3>

        <!-- Mot de passe actuel -->
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
            <input type="password" name="current_password" id="current_password"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
            @error('current_password')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nouveau mot de passe -->
        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
            <input type="password" name="new_password" id="new_password"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
            @error('new_password')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirmation -->
        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le nouveau mot de passe</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
        </div>


        <!-- Bouton de soumission -->
        <div class="flex justify-end">
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white font-medium px-6 py-2 rounded-md transition">
                Enregistrer les modifications
            </button>
        </div>
    </form>
    @else
        <div class="text-red-600">
            Erreur : Aucun utilisateur connecté trouvé.
        </div>
    @endif
</div>
@endsection