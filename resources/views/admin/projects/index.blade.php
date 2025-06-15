@extends('admin.layouts.app')

@section('title', 'Projets')

@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Projets</h2>
        <p class="text-gray-600">Gérez vos projets de portfolio</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="mt-4 md:mt-0 bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg font-medium flex items-center transition">
        <i class="fas fa-plus mr-2"></i> Ajouter un projet
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <form method="GET" action="{{ route('admin.projects.index') }}">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex flex-col md:flex-row gap-4 md:items-center w-full">
                <div class="relative w-full md:w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher un projet..."
                        class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 w-full"
                    >
                </div>

                <div class="w-full md:w-auto">
                    <select name="category" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 w-full md:w-auto">
                        <option value="">Toutes les catégories</option>
                        <option value="Web" {{ request('category') == 'Web' ? 'selected' : '' }}>Développement Web</option>
                        <option value="Mobile" {{ request('category') == 'Mobile' ? 'selected' : '' }}>Application Mobile</option>
                        <option value="Design" {{ request('category') == 'Design' ? 'selected' : '' }}>Design</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
                    <i class="fas fa-search text-sm"></i>
                    <span>Rechercher</span>
                </button>
                <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 border text-gray-600 rounded hover:bg-gray-50 transition">
                    Réinitialiser
                </a>
            </div>
        </div>
    </form>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($projects as $project)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-16 h-10 rounded object-cover">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $project->title }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($project->description, 60) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            {{ $project->category == 'Web' ? 'bg-purple-100 text-purple-800' :
                               ($project->category == 'Mobile' ? 'bg-blue-100 text-blue-800' :
                               ($project->category == 'Design' ? 'bg-pink-100 text-pink-800' : 'bg-gray-100 text-gray-800')) }}">
                            {{ $project->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $project->date }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            {{ $project->status == 'Publié' ? 'bg-green-100 text-green-800' :
                               ($project->status == 'Brouillon' ? 'bg-yellow-100 text-yellow-800' :
                               'bg-red-100 text-red-800') }}">
                            {{ $project->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.projects.show', $project) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:text-blue-900"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Supprimer ce projet ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Aucun projet trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($projects->hasPages())
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t sm:px-6">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection
