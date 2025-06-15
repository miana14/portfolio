<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Me Contacter</h2>

        <div class="max-w-lg mx-auto">

            {{-- Message de succès --}}
            @if(session('success-contact'))
                <div class="mb-6 bg-green-100 text-green-700 px-4 py-3 rounded shadow text-center">
                    {{ session('success-contact') }}
                </div>
            @endif

            {{-- Affichage des erreurs de validation --}}
            @if($errors->any())
                <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded shadow">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="bg-white rounded-lg shadow-lg p-8">
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
                    <label for="subject" class="block text-gray-700 font-medium mb-2">Sujet</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">{{ old('message') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-purple-600 text-white py-3 rounded-lg font-bold hover:bg-purple-700 transition">
                    Envoyer
                </button>
            </form>

            <div class="mt-12 flex flex-col md:flex-row justify-center items-center gap-8">
                <div class="flex items-center">
                    <div class="bg-purple-100 rounded-full p-3 mr-4">
                        <i class="fas fa-envelope text-xl text-purple-600"></i>
                    </div>
                    <span class="text-gray-700">marianadias14b@hotmail.com</span>
                </div>
                <div class="flex items-center">
                    <div class="bg-purple-100 rounded-full p-3 mr-4">
                        <i class="fas fa-phone text-xl text-purple-600"></i>
                    </div>
                    <span class="text-gray-700">+33 7 82 86 90 32</span>
                </div>
            </div>
        </div>
    </div>
</section>
