@extends('admin.layouts.app')

@section('title', 'Devis')

@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Demandes de devis</h2>
        <p class="text-gray-600">Consultez les demandes envoyées par les utilisateurs</p>
    </div>
</div>

<!-- Table responsive avec scroll -->
<div class="bg-white rounded-lg shadow-md overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Services</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden lg:table-cell">Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($requests as $request)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 text-sm font-medium text-gray-800">{{ $request->name }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ $request->email }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">
                    <ul class="space-y-1">
                        @foreach($request->services as $service)
                            <li class="text-sm text-gray-700">
                                {{ $service->title }} ({{ $service->price }} €)
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td class="px-4 py-3 text-sm font-semibold text-purple-700">{{ $request->total }} €</td>
                <td class="px-4 py-3 text-sm text-gray-600">
                    {{ \Illuminate\Support\Str::limit($request->message, 40) }}
                </td>
                <td class="px-4 py-3 text-sm text-gray-500 hidden lg:table-cell">
                    {{ $request->created_at->format('d/m/Y') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="px-4 py-3 border-t bg-white">
    <p class="text-sm text-gray-700">
        Affichage de <span class="font-semibold">1</span> à <span class="font-semibold">{{ count($requests) }}</span> sur <span class="font-semibold">{{ count($requests) }}</span> devis
    </p>
</div>
@endsection
