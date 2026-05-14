<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- OVERLAY (MOBILE ONLY) -->
        <div id="overlay"
            class="fixed inset-0 bg-black/50 hidden md:hidden"
            onclick="toggleSidebar()"></div>

        <!-- ================= SIDEBAR ================= -->
        <aside id="sidebar"
            class="bg-gray-900 text-white
               fixed md:fixed
               top-0 left-0 h-full
               w-64
               transform -translate-x-full md:translate-x-0
               transition-transform duration-300 z-50">

            <div class="p-4 text-xl font-bold border-b border-gray-700">
                Admin Panel
            </div>

            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.index') }}" class="block p-2 rounded hover:bg-gray-700">
                    <i class="fas fa-gauge-high mr-2"></i> Dashboard
                </a>

                <a href="{{ route('admin.user') }}" class="block p-2 rounded hover:bg-gray-700">
                    <i class="fas fa-users mr-2"></i> Users
                </a>

                <a href="{{ route('admin.orders') }}" class="block p-2 rounded hover:bg-gray-700">
                    <i class="fas fa-cart-shopping mr-2"></i> Orders
                </a>

                <a href="{{ route('admin.list') }}" class="block p-2 rounded hover:bg-gray-700">
                    <i class="fas fa-file-invoice-dollar mr-2"></i> Invoices
                </a>

                <a href="{{ route('admin.productItem') }}" class="block p-2 rounded hover:bg-gray-700">
                    <i class="fas fa-box mr-2"></i> Product
                </a>
                <a href="{{ route('admin.orderchart') }}"
                    class="block p-2 rounded hover:bg-gray-700 transition duration-200">

                    <i class="fas fa-chart-line mr-2 text-400"></i>
                    Order Chart

                </a>

            </nav>
        </aside>

        <!-- ================= MAIN ================= -->
        <div class="flex-1 flex flex-col min-h-screen md:pl-64">

            <!-- HEADER -->
            <header class="bg-blue-600 text-white flex items-center justify-between px-4 py-3">

                <button class="md:hidden bg-white text-black px-3 py-1 rounded"
                    onclick="toggleSidebar()">
                    ☰
                </button>

                <h1 class="font-bold">Dashboard</h1>


                @auth

                <li class="relative list-none">

                    {{-- Profile Button --}}
                    <button id="profileBtn" type="button"
                        class="flex items-center gap-3 cursor-pointer bg-gradient-to-r from-gray-900 to-gray-800 px-4 py-2 rounded-2xl border border-gray-700 shadow-lg hover:border-yellow-500 transition duration-300">

                        {{-- Avatar --}}
                        <div
                            class="w-11 h-11 rounded-full bg-yellow-400 text-black flex items-center justify-center font-bold text-lg uppercase">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>

                        {{-- User Name --}}
                        <div class="hidden md:flex flex-col leading-tight text-left">
                            <span class="text-sm font-semibold text-white">
                                {{ Auth::user()->name }}
                            </span>

                            <span class="text-xs text-gray-400">
                                My Profile
                            </span>
                        </div>

                        {{-- Arrow --}}
                        <i class="fa-solid fa-chevron-down text-gray-400 text-xs"></i>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div id="profileMenu"
                        class="hidden absolute right-0 mt-3 w-72 bg-gray-900 border border-gray-700 rounded-2xl shadow-2xl overflow-hidden z-50">

                        {{-- Top User Info --}}
                        <div class="p-5 border-b border-gray-800 flex items-center gap-4">

                            <div
                                class="w-14 h-14 rounded-full bg-yellow-400 text-black flex items-center justify-center font-bold text-2xl uppercase">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>

                            <div>
                                <h3 class="text-white font-semibold text-lg">
                                    {{ Auth::user()->name }}
                                </h3>

                                <p class="text-gray-400 text-sm break-all">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                        </div>

                        {{-- Menu --}}
                        <div class="p-3 space-y-2">
                            {{-- Logout --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="w-full flex items-center gap-3 text-red-400 hover:bg-red-600 hover:text-white px-4 py-3 rounded-xl transition">

                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    Logout
                                </button>
                            </form>

                        </div>
                    </div>

                </li>

                {{-- Dropdown Script --}}
                <script>
                    const profileBtn = document.getElementById('profileBtn');
                    const profileMenu = document.getElementById('profileMenu');

                    profileBtn.addEventListener('click', function() {
                        profileMenu.classList.toggle('hidden');
                    });

                    // Close when click outside
                    document.addEventListener('click', function(e) {
                        if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                            profileMenu.classList.add('hidden');
                        }
                    });
                </script>

                @else

                <li class="list-none">
                    <a href="{{ route('login') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl font-medium shadow-md transition duration-300">
                        Login
                    </a>
                </li>

                @endauth
            </header>

            <!-- CONTENT -->
            <main class="flex-1 p-4">
                @yield('content')
            </main>

            <!-- FOOTER -->
            <footer class="bg-gray-900 text-gray-300 text-center py-3">
                <p class="mb-0">All Rights Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed by <a class="text-white border-bottom" href="https://8dots.in">8Dots</a>
                </p>
            </footer>

        </div>
    </div>

    <!-- JS -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>

</body>

</html>