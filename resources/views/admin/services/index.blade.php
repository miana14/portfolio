@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Services</h2>
        <p class="text-gray-600">Liste des services proposés</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
        <i class="fas fa-plus mr-2"></i> Ajouter un service
    </a>
</div>

<!-- Filters -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <form method="GET" action="{{ route('admin.services.index') }}">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex flex-col md:flex-row gap-4 md:items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 text-sm"></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher un service..."
                        class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 w-full md:w-64"
                    >
                </div>
                <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
                    <i class="fas fa-search text-sm"></i>
                    <span>Rechercher</span>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Tableau avec scroll horizontal -->
<div class="bg-white shadow rounded-lg p-4 overflow-x-auto">
    <table class="w-full min-w-[500px] table-auto">
        <thead>
            <tr class="text-left bg-gray-100">
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Prix (€)</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $service->title }}</td>
                    <td class="px-4 py-2">{{ $service->price }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:underline mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce service ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
