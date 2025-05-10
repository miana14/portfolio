@extends('admin.layouts.app')

@section('title', 'Ajouter un projet')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un projet</h2>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.projects.partials.form')

        <div class="mt-6 text-right">
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
