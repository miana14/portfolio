@csrf

<!-- Titre -->
<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700">Titre du projet</label>
    <input type="text" name="title" id="title" value="{{ old('title', $project->title ?? '') }}"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500" required>
    @error('title')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Description -->
<div class="mb-4">
    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
    <textarea name="description" id="description" rows="4"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500" required>{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Catégorie -->
<div class="mb-4">
    <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
    <select name="category" id="category"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500" required>
        <option value="Web" {{ old('category', $project->category ?? '') == 'Web' ? 'selected' : '' }}>Web</option>
        <option value="Mobile" {{ old('category', $project->category ?? '') == 'Mobile' ? 'selected' : '' }}>Mobile</option>
        <option value="Design" {{ old('category', $project->category ?? '') == 'Design' ? 'selected' : '' }}>Design</option>
    </select>
    @error('category')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Date -->
<div class="mb-4">
    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
    <input type="date" name="date" id="date" value="{{ old('date', $project->date ?? '') }}"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
    @error('date')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Statut -->
<div class="mb-4">
    <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
    <select name="status" id="status"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500" required>
        <option value="Publié" {{ old('status', $project->status ?? '') == 'Publié' ? 'selected' : '' }}>Publié</option>
        <option value="Brouillon" {{ old('status', $project->status ?? '') == 'Brouillon' ? 'selected' : '' }}>Brouillon</option>
        <option value="Archivé" {{ old('status', $project->status ?? '') == 'Archivé' ? 'selected' : '' }}>Archivé</option>
    </select>
    @error('status')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Image -->
<div class="mb-6">
    <label for="image" class="block text-sm font-medium text-gray-700">Image du projet</label>
    <input type="file" name="image_file" id="image_file"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
    @error('image')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror

    @if (!empty($project->image))
        <p class="mt-2 text-sm text-gray-600">Image actuelle :</p>
        <img src="{{ $project->image_url }}" class="w-32 h-auto mt-2 rounded shadow">
    @endif
</div>
