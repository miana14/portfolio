@csrf

<!-- Titre -->
<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700">Titre du service</label>
    <input type="text" name="title" id="title" value="{{ old('title', $service->title ?? '') }}"
           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500" required>
    @error('title')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Description -->
<div class="mb-4">
    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
    <textarea name="description" id="description" rows="4"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500" required>{{ old('description', $service->description ?? '') }}</textarea>
    @error('description')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Prix -->
<div class="mb-4">
    <label for="price" class="block text-sm font-medium text-gray-700">Prix (€)</label>
    <input type="number" name="price" id="price" value="{{ old('price', $service->price ?? '') }}"
           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500" required>
    @error('price')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Bouton d’enregistrement -->
<div class="flex justify-end">
    <button type="submit"
            class="bg-purple-600 hover:bg-purple-700 text-white font-medium px-6 py-2 rounded-md transition">
        {{ isset($service) ? 'Mettre à jour' : 'Ajouter' }}
    </button>
</div>
