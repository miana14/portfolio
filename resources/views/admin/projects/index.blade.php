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

<!-- Filters -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex flex-col md:flex-row gap-4 md:items-center">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" placeholder="Rechercher un projet..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 w-full md:w-64">
            </div>
            <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                <option value="">Toutes les catégories</option>
                <option value="web">Développement Web</option>
                <option value="mobile">Application Mobile</option>
                <option value="design">Design</option>
            </select>
        </div>
        <div class="flex items-center gap-2">
            <button class="px-4 py-2 border rounded-lg hover:bg-gray-50 transition">
                <i class="fas fa-sort-amount-down mr-2"></i> Trier
            </button>
            <button class="px-4 py-2 border rounded-lg hover:bg-gray-50 transition">
                <i class="fas fa-filter mr-2"></i> Filtrer
            </button>
        </div>
    </div>
</div>

<!-- Projects List -->
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
                @foreach($projects as $project)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-16 h-10 rounded object-cover">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $project['title'] }}</div>
                        <div class="text-sm text-gray-500">{{ $project['description'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($project['category'] == 'Web')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">{{ $project['category'] }}</span>
                        @elseif($project['category'] == 'Mobile')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $project['category'] }}</span>
                        @elseif($project['category'] == 'Design')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">{{ $project['category'] }}</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">{{ $project['category'] }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $project['date'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($project['status'] == 'Publié')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $project['status'] }}</span>
                        @elseif($project['status'] == 'Brouillon')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $project['status'] }}</span>
                        @elseif($project['status'] == 'Archivé')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $project['status'] }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.projects.show', $project['id']) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project['id']) }}" class="text-blue-600 hover:text-blue-900"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project['id']) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="bg-white px-4 py-3 flex items-center justify-between border-t sm:px-6">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Affichage de <span class="font-medium">1</span> à <span class="font-medium">{{ count($projects) }}</span> sur <span class="font-medium">{{ count($projects) }}</span> projets
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Précédent</span>
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-purple-50 text-sm font-medium text-purple-600 hover:bg-purple-100">
                        1
                    </a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Suivant</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection