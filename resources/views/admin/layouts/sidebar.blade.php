<aside id="sidebar" class="sidebar bg-gray-800 shrink-0 text-white w-64 md:w-64 md:translate-x-0 fixed md:relative h-full z-10">
    <div class="p-6">
        <div class="flex items-center justify-center mb-8">
            <button class="focus:outline-none flex items-center space-x-3">
                <i class="fas fa-address-card text-xl"></i>
                <span class="text-xl font-bold">MonPortfolio</span>
            </button>
        </div>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 {{ request()->routeIs('admin.dashboard') ? 'text-purple-400 bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg px-4 py-3 transition">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 {{ request()->routeIs('dashboard') ? 'text-purple-400 bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg px-4 py-3 transition">
                        <i class="fas fa-table"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}" class="flex items-center space-x-3 {{ request()->routeIs('admin.services.*') ? 'text-purple-400 bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg px-4 py-3 transition">
                        <i class="fas fa-briefcase"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center space-x-3 {{ request()->routeIs('admin.projects.*') ? 'text-purple-400 bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg px-4 py-3 transition">
                        <i class="fas fa-project-diagram"></i>
                        <span>Projets</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.quotes.index') }}" class="flex items-center space-x-3 {{ request()->routeIs('admin.quotes.*') ? 'text-purple-400 bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg px-4 py-3 transition">
                        <i class="fa-solid fa-file"></i>
                        <span>Devis</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.messages.index') }}" class="flex items-center space-x-3 {{ request()->routeIs('admin.messages.*') ? 'text-purple-400 bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg px-4 py-3 transition">
                        <i class="fas fa-envelope"></i>
                        <span>Messages</span>
                        @if($unreadMessagesCount ?? 0 > 0)
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $unreadMessagesCount }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profile.edit') }}" class="flex items-center space-x-3 {{ request()->routeIs('admin.profile.*') ? 'text-purple-400 bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg px-4 py-3 transition">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 {{ request()->routeIs('admin.settings') ? 'text-purple-400 bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded-lg px-4 py-3 transition">
                        <i class="fas fa-cog"></i>
                        <span>Paramètres</span>
                    </a>
                </li>
                <li class="pt-8">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-700 rounded-lg px-4 py-3 transition">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Déconnexion</span>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>