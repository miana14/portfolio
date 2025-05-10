@extends('admin.layouts.app')

@section('title', 'Modifier le projet')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Modifier le projet</h2>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.projects.partials.form', ['project' => $project])

        @if ($project->image)
            <div class="mt-4">
                <label class="block text-gray-700 mb-1">Image actuelle :</label>
                <img src="{{ asset('storage/' . $project->image) }}" alt="Image projet" class="w-32 h-20 object-cover rounded shadow">
            </div>
        @endif

        <div class="mt-6 text-right">
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
