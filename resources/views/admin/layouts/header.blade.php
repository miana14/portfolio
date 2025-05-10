<header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
    <div class="flex items-center">
        <button id="sidebarToggle" class="md:hidden mr-4">
            <i class="fas fa-bars"></i>
        </button>
        <h1 class="text-xl font-bold text-gray-800">BackOffice Portfolio</h1>
    </div>
    <div class="flex items-center space-x-4">
        <div class="relative">
            <button class="text-gray-600 focus:outline-none">
                <i class="fas fa-bell text-xl"></i>
                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
            </button>
        </div>
        <div class="flex items-center space-x-2">
            <button class="text-gray-600 focus:outline-none">
                <i class="fas fa-user text-xl"></i>
            </button>
            <span class="hidden md:inline-block text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
            <div class="relative">
                <button class="text-gray-600 focus:outline-none">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </div>
</header>