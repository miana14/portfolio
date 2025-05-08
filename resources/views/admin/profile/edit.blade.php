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