<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-800">MonPortfolio</a>
            <div class="hidden md:flex space-x-6">
                <a href="#accueil" class="text-gray-800 hover:text-purple-600 transition">Accueil</a>
                <a href="#apropos" class="text-gray-800 hover:text-purple-600 transition">À propos</a>
                <a href="#projets" class="text-gray-800 hover:text-purple-600 transition">Projets</a>
                <a href="#competences" class="text-gray-800 hover:text-purple-600 transition">Compétences</a>
                <a href="#contact" class="text-gray-800 hover:text-purple-600 transition">Contact</a>
                <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-purple-600 transition">Dashboard</a>
            </div>
            <div class="md:hidden">
                <button class="text-gray-800 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Section Accueil -->
    <section id="accueil" class="py-20 bg-gradient-to-r from-purple-500 to-indigo-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Bonjour, je suis <span class="text-yellow-300">Mariana Loureiro Dias</span></h1>
            <p class="text-xl md:text-2xl mb-12">Développeur Web & Designer</p>
            <a href="#contact" class="bg-white text-purple-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition">Me Contacter</a>
        </div>
    </section>

    <!-- Section À propos -->
    <section id="apropos" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">À propos de moi</h2>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="{{ asset('/images/no-photo.jpg')}}" alt="Photo de profil" class="rounded-lg shadow-lg mx-auto">
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <p class="text-gray-600 mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. 
                        Cras porttitor metus in nibh finibus, vel tempor velit placerat. Fusce ut viverra lectus, non commodo nisl.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Praesent sed dictum nulla. Sed lacinia, arcu id facilisis imperdiet, lorem sapien eleifend justo, 
                        a pretium massa ex non dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-purple-600 hover:text-purple-800">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                        <a href="#" class="text-purple-600 hover:text-purple-800">
                            <i class="fab fa-github text-2xl"></i>
                        </a>
                        <a href="#" class="text-purple-600 hover:text-purple-800">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Projets -->
    <section id="projets" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Mes Projets</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>

                            @if($project->category)
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">{{ $project->category }}</span>
                            </div>
                            @endif

                            <a href="{{ route('admin.projects.show', $project) }}" class="text-purple-600 hover:text-purple-800 font-medium">
                                Voir le projet →
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-3">Aucun projet à afficher pour le moment.</p>
                @endforelse
            </div>
        </div>
    </section>


    <!-- Section Compétences -->
    <section id="competences" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Mes Compétences</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Compétence 1 -->
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-6 inline-block mb-4">
                        <i class="fab fa-php text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">PHP</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 90%"></div>
                    </div>
                </div>
                
                <!-- Compétence 2 -->
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-6 inline-block mb-4">
                        <i class="fab fa-laravel text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Laravel</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                
                <!-- Compétence 3 -->
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-6 inline-block mb-4">
                        <i class="fab fa-js text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">JavaScript</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 80%"></div>
                    </div>
                </div>
                
                <!-- Compétence 4 -->
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-6 inline-block mb-4">
                        <i class="fab fa-html5 text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">HTML/CSS</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 95%"></div>
                    </div>
                </div>
                
                <!-- Compétence 5 -->
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-6 inline-block mb-4">
                        <i class="fas fa-database text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">MySQL</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
                
                <!-- Compétence 6 -->
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-6 inline-block mb-4">
                        <i class="fab fa-git-alt text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Git</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 70%"></div>
                    </div>
                </div>
                
                <!-- Compétence 7 -->
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-6 inline-block mb-4">
                        <i class="fab fa-vuejs text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Vue.js</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
                
                <!-- Compétence 8 -->
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-6 inline-block mb-4">
                        <i class="fab fa-docker text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Docker</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 60%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Calculatrice de devis -->
    <section id="devis" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Calculatrice de devis estimatif</h2>
            <p class="text-center mb-6 text-gray-600">Sélectionnez les services souhaités et envoyez votre demande :</p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Services à gauche -->
                <div>
                    <div id="services-container" class="grid grid-cols-1 gap-6 mb-6"></div>

                    <div class="text-center text-xl font-bold">
                        Total estimé : <span id="total-price">0</span> €
                        <input type="hidden" id="total-hidden" name="total" value="0">
                    </div>
                </div>

                <!-- Formulaire à droite -->
                <form id="estimate-form" class="bg-gray-50 p-6 rounded-lg shadow-md w-full">
                    @csrf
                    <input type="hidden" name="services" id="selected-services">

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500">
                    </div>

                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4"
                            class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-purple-500 focus:border-purple-500"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-purple-600 text-white py-3 rounded-lg font-bold hover:bg-purple-700 transition">
                        Envoyer la demande de devis
                    </button>

                    <div id="form-response" class="mt-4 text-center text-sm text-green-600 hidden">
                        Merci ! Votre demande a été envoyée.
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Section Contact -->
    <section id="contact" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Me Contacter</h2>
            <div class="max-w-lg mx-auto">
                <form action="#" method="POST" class="bg-white rounded-lg shadow-lg p-8">
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg font-bold hover:bg-purple-700 transition">Envoyer</button>
                </form>
                
                <div class="mt-12 flex flex-col md:flex-row justify-center items-center gap-8">
                    <div class="flex items-center">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <i class="fas fa-envelope text-xl text-purple-600"></i>
                        </div>
                        <span class="text-gray-700">contact@monportfolio.com</span>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <i class="fas fa-phone text-xl text-purple-600"></i>
                        </div>
                        <span class="text-gray-700">+33 6 12 34 56 78</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="text-2xl font-bold">MonPortfolio</a>
                    <p class="mt-2 text-gray-400">Développeur Web & Designer</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-purple-400 transition">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-purple-400 transition">
                        <i class="fab fa-github text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-purple-400 transition">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="hover:text-purple-400 transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 MonPortfolio. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript pour le menu mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('button');
            const mobileMenu = document.createElement('div');
            mobileMenu.className = 'md:hidden bg-white absolute w-full left-0 top-16 shadow-md py-4 px-6 z-50 hidden';
            mobileMenu.innerHTML = `
                <a href="#accueil" class="block py-2 text-gray-800 hover:text-purple-600 transition">Accueil</a>
                <a href="#apropos" class="block py-2 text-gray-800 hover:text-purple-600 transition">À propos</a>
                <a href="#projets" class="block py-2 text-gray-800 hover:text-purple-600 transition">Projets</a>
                <a href="#competences" class="block py-2 text-gray-800 hover:text-purple-600 transition">Compétences</a>
                <a href="#contact" class="block py-2 text-gray-800 hover:text-purple-600 transition">Contact</a>
            `;
            
            document.querySelector('nav').appendChild(mobileMenu);
            
            menuButton.addEventListener('click', function() {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('hidden');
                }
            });
            
            // Fermer le menu mobile lors du clic sur un lien
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                });
            });
        });

    function updateEstimate() {
            const checked = document.querySelectorAll('.service-checkbox:checked');
            const serviceIds = Array.from(checked).map(cb => cb.dataset.id);

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
                    document.getElementById('total-price').innerText =
                        `${data.total}`
                } else {
                    document.getElementById('total-price').innerText = 'Erreur dans la réponse.';
                }
            })
            .catch(error => {
                console.error(error);
                document.getElementById('total-price').innerText = 'Erreur lors de l’estimation.';
            });
        }

    document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('services-container');
    const totalSpan = document.getElementById('total-price');


    // Ajouter l'écouteur de clic à chaque checkbox
    document.querySelectorAll('.service-checkbox').forEach(checkbox => {
        checkbox.addEventListener('click', updateEstimate);
    });

    fetch('http://portfolio.test/api/services')
        .then(response => response.json())
        .then(data => {
            const services = data.member;

            services.forEach(service => {
                const div = document.createElement('div');
                div.className = 'border p-4 rounded-lg shadow hover:shadow-lg transition cursor-pointer bg-white';
                div.innerHTML = `
                    <h3 class="text-lg font-bold text-gray-800">${service.title}</h3>
                    <p class="text-gray-600 mb-2">${service.description}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-purple-600 font-semibold">${service.price} €</span>
                        <input type="checkbox" class="service-checkbox" onClick="updateEstimate()" name="service-checkbox" data-price="${service.price}" data-id="${service.id}" >
                    </div>
                `;
                container.appendChild(div);
            });

            
        })
        .catch(error => {
            container.innerHTML = '<p class="text-red-600">Erreur lors du chargement des services.</p>';
            console.error(error);
        });
});
    </script>
</body>
</html>
