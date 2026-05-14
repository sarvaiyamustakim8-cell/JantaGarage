<header class="bg-blue-600 text-white px-4 py-3">

    <div class="flex items-center justify-between">

        <!-- Logo -->
        <h1 class="text-lg sm:text-xl font-bold">JantaGarage Admin</h1>

        <!-- Mobile Menu Button -->
        <button onclick="toggleSidebar()" class="sm:hidden text-2xl">
            ☰
        </button>

        <!-- Right Section (Desktop) -->
        <div class="hidden sm:flex items-center space-x-4">
            <span class="text-sm md:text-base">
                Welcome, {{ auth()->user()->name ?? 'Admin' }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded transition">
                    Logout
                </button>
            </form>
        </div>

    </div>

    <!-- Mobile Dropdown -->
    <div id="mobileMenu" class="hidden mt-3 flex flex-col space-y-3 sm:hidden">

        <span>
            Welcome, {{ auth()->user()->name ?? 'Admin' }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 w-full py-2 rounded">
                Logout
            </button>
        </form>

    </div>

</header>

<!-- Toggle Script -->
<script>
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>