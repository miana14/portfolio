@extends('admin.layouts.app')

@section('title', 'Paramètres')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Paramètres du site</h2>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        @method('PUT')

        <!-- Titre du site -->
        <div class="mb-4">
            <label for="site_title" class="block text-sm font-medium text-gray-700">Titre du site</label>
            <input type="text" id="site_title" name="site_title" value="{{ old('site_title', 'Mon Portfolio') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
        </div>

        <!-- Favicon -->
        <div class="mb-4">
            <label for="favicon" class="block text-sm font-medium text-gray-700">Favicon (URL ou nom de fichier)</label>
            <input type="text" id="favicon" name="favicon" value="{{ old('favicon', 'favicon.ico') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
        </div>

        <!-- SEO -->
        <div class="mb-4">
            <label for="seo_keywords" class="block text-sm font-medium text-gray-700">Mots-clés SEO</label>
            <input type="text" id="seo_keywords" name="seo_keywords" value="{{ old('seo_keywords', 'portfolio, développeur web') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-md transition">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>
@endsection
