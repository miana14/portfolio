<section id="devis" class="py-20 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Calculatrice de devis estimatif</h2>
        <p class="text-center mb-6 text-gray-600">Sélectionnez les services souhaités et envoyez votre demande :</p>

        @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-700 px-4 py-3 rounded shadow text-center max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded shadow text-center max-w-2xl mx-auto">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Services dynamiques -->
            <div>
                <div id="services-container" class="grid grid-cols-1 gap-6 mb-6"></div>

                <div class="text-center text-xl font-bold">
                    Total estimé : <span id="total-price">0</span> €
                    <input type="hidden" id="total-hidden" name="total" value="0">
                </div>
            </div>

            <!-- Formulaire -->
            <form id="estimate-form" action="{{ route('quote-request.store') }}" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-md w-full">
                @csrf

                <div id="services-hidden-inputs"></div> <!-- Champs hidden pour chaque checkbox -->

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" rows="4"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500">{{ old('message') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-purple-600 text-white py-3 rounded-lg font-bold hover:bg-purple-700 transition">
                    Envoyer la demande de devis
                </button>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('services-container');
        const totalSpan = document.getElementById('total-price');
        const totalHidden = document.getElementById('total-hidden');
        const hiddenInputsWrapper = document.getElementById('services-hidden-inputs');

        function updateEstimate() {
            const checked = document.querySelectorAll('.service-checkbox:checked');
            const serviceIds = Array.from(checked).map(cb => parseInt(cb.dataset.id));

            // MAJ champs cachés pour l'envoi du formulaire
            hiddenInputsWrapper.innerHTML = '';
            serviceIds.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'services[]';
                input.value = id;
                hiddenInputsWrapper.appendChild(input);
            });

            // Appel API pour estimer le total
            fetch('/api/estimate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ services: serviceIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.total !== undefined) {
                    totalSpan.innerText = data.total.toFixed(2);
                    totalHidden.value = data.total.toFixed(2);
                } else {
                    totalSpan.innerText = 'Erreur dans la réponse';
                }
            })
            .catch(error => {
                console.error(error);
                totalSpan.innerText = 'Erreur de calcul';
            });
        }

        fetch('{{ url('/api/services') }}')
            .then(response => response.json())
            .then(data => {
                const services = data.member;
                services.forEach(service => {
                    const div = document.createElement('div');
                    div.className = 'border p-4 rounded-lg shadow hover:shadow-lg transition cursor-pointer bg-white flex items-center justify-between';
                    div.innerHTML = `
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">${service.title}</h3>
                            <p class="text-gray-600 mb-1">${service.description}</p>
                            <span class="text-purple-600 font-semibold">${parseFloat(service.price).toFixed(2)} €</span>
                        </div>
                        <input type="checkbox" class="service-checkbox ml-4" data-id="${service.id}" data-price="${service.price}">
                    `;
                    container.appendChild(div);
                });

                document.querySelectorAll('.service-checkbox').forEach(checkbox => {
                    checkbox.addEventListener('change', updateEstimate);
                });
            })
            .catch(error => {
                container.innerHTML = '<p class="text-red-600">Erreur lors du chargement des services.</p>';
                console.error(error);
            });
    });
</script>
