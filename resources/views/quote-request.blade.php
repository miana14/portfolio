
<div id="devis" class="py-20 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Demande de Devis</h2>

        @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-700 px-4 py-3 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded shadow">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="max-w-lg mx-auto">
            <form action="{{ route('quote-request.store') }}" method="POST" class="bg-white rounded-lg shadow-lg p-8">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Services souhaités</label>
                    <div class="space-y-2">
                        @foreach ($services as $service)
                            <label class="flex items-center">
                                <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                    class="mr-2" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                <span class="text-gray-700">{{ $service->title }} - {{ number_format($service->price, 2) }} €</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="5"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">{{ old('message') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-purple-600 text-white py-3 rounded-lg font-bold hover:bg-purple-700 transition">
                    Envoyer la demande
                </button>
            </form>
        </div>
    </div>
</div>

