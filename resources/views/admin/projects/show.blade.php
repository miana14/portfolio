@extends('admin.layouts.app')

@section('title', 'Détail du projet')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ $project->title }}</h2>

    @if($project->image)
        <div class="mb-6">
            <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full max-w-md mx-auto rounded shadow">
        </div>
    @endif

    <div class="mb-4 text-gray-600">
        <strong>Description :</strong>
        <p>{{ $project->description }}</p>
    </div>

    <div class="mb-4 text-gray-600">
        <strong>Catégorie :</strong>
        <span>{{ $project->category }}</span>
    </div>

    <div class="mb-4 text-gray-600">
        <strong>Statut :</strong>
        <span>{{ $project->status }}</span>
    </div>

    <div class="mb-4 text-gray-600">
        <strong>Date :</strong>
        <span>{{ $project->created_at->format('d/m/Y') }}</span>
    </div>

    <a href="{{ route('admin.projects.index') }}" class="inline-block mt-6 bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
        ← Retour à la liste
    </a>
</div>
@endsection
