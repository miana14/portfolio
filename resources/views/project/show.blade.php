@extends('layouts.app')

@section('title', $project->title)

@section('content')
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <a href="{{ route('portfolio') }}"
            class="inline-block mb-6 text-purple-600 hover:text-purple-800 font-semibold">
            ← Retour au portfolio
        </a>
        <h1 class="text-4xl font-bold text-gray-800 mb-6">{{ $project->title }}</h1>
        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-64 object-cover mb-6 rounded-lg shadow">

        <p class="text-gray-700 mb-6">{{ $project->description }}</p>

        @if($project->category)
            <span class="inline-block bg-purple-100 text-purple-600 px-4 py-2 rounded-full mb-4">{{ $project->category }}</span>
        @endif

        <p class="text-sm text-gray-500">{{ $project->status }}</p>
    </div>
</section>
@endsection
