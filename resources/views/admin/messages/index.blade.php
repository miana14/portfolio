@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Messages</h2>
        <p class="text-gray-600">Consultez et gérez les messages reçus</p>
    </div>
</div>

<!-- Liste des messages -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lu</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($messages as $message)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">
                        {{ $message['name'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $message['email'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ \Illuminate\Support\Str::limit($message['content'], 50) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($message['read'])
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Lu</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Non lu</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.messages.show', $message['id']) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.messages.edit', $message['id']) }}" class="text-blue-600 hover:text-blue-900"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.messages.destroy', $message['id']) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Supprimer ce message ?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination ou informations -->
    <div class="bg-white px-4 py-3 border-t">
        <p class="text-sm text-gray-700">
            Affichage de <span class="font-medium">1</span> à <span class="font-medium">{{ count($messages) }}</span> sur <span class="font-medium">{{ count($messages) }}</span> messages
        </p>
    </div>
</div>
@endsection
