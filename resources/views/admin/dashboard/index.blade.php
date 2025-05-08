@extends('admin.layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Tableau de bord</h2>
    <p class="text-gray-600">Bienvenue dans votre espace d'administration</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Projets</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $projectsCount ?? 12 }}</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <i class="fas fa-project-diagram text-purple-600 text-xl"></i>
            </div>
        </div>
        <p class="text-green-500 text-sm mt-4"><i class="fas fa-arrow-up mr-1"></i> +25% ce mois</p>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Messages</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $messagesCount ?? 24 }}</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-envelope text-blue-600 text-xl"></i>
            </div>
        </div>
        <p class="text-green-500 text-sm mt-4"><i class="fas fa-arrow-up mr-1"></i> +12% ce mois</p>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Visiteurs</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $visitorsCount ?? 1254 }}</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-users text-green-600 text-xl"></i>
            </div>
        </div>
        <p class="text-green-500 text-sm mt-4"><i class="fas fa-arrow-up mr-1"></i> +18% ce mois</p>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Téléchargements</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $downloadsCount ?? 835 }}</h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
                <i class="fas fa-download text-yellow-600 text-xl"></i>
            </div>
        </div>
        <p class="text-red-500 text-sm mt-4"><i class="fas fa-arrow-down mr-1"></i> -5% ce mois</p>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-gray-800">Activité récente</h3>
        <a href="#" class="text-purple-600 hover:text-purple-800 text-sm">Voir tout</a>
    </div>
    <div class="space-y-6">
        @forelse($recentActivities ?? [] as $activity)
            <div class="flex items-start">
                <div class="bg-{{ $activity->color }}-100 p-3 rounded-full mr-4">
                    <i class="fas fa-{{ $activity->icon }} text-{{ $activity->color }}-600"></i>
                </div>
                <div>
                    <p class="text-gray-800 font-medium">{{ $activity->title }}</p>
                    <p class="text-gray-500 text-sm">{{ $activity->description }}</p>
                    <p class="text-gray-400 text-xs mt-1">{{ $activity->time }}</p>
                </div>
            </div>
        @empty
            <!-- Activités par défaut si aucune n'est fournie -->
            <div class="flex items-start">
                <div class="bg-purple-100 p-3 rounded-full mr-4">
                    <i class="fas fa-plus text-purple-600"></i>
                </div>
                <div>
                    <p class="text-gray-800 font-medium">Nouveau projet ajouté</p>
                    <p class="text-gray-500 text-sm">Vous avez ajouté le projet "Application Mobile"</p>
                    <p class="text-gray-400 text-xs mt-1">Il y a 2 heures</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <i class="fas fa-envelope text-blue-600"></i>
                </div>
                <div>
                    <p class="text-gray-800 font-medium">Nouveau message</p>
                    <p class="text-gray-500 text-sm">Vous avez reçu un message de Jean Dupont</p>
                    <p class="text-gray-400 text-xs mt-1">Il y a 5 heures</p>
                </div>
            </div>
        @endforelse
    </div>
</div>

<!-- Quick Actions & Recent Messages -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Reste du contenu comme dans le HTML original, adapté avec des variables Blade -->
</div>
@endsection