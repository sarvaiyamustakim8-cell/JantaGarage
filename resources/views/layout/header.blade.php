<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Janta Garage</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1a1a1a] text-white">

    <!-- HEADER -->
    <header class="fixed w-full z-50 bg-black/60 backdrop-blur-md border-b border-gray-800">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            <!-- LOGO -->
            <div class="text-2xl font-bold text-orange-500">
                JANTA<span class="text-white">GARAGE</span>
            </div>

            <!-- DESKTOP MENU -->
            <nav class="hidden md:flex space-x-8 text-sm uppercase font-medium items-center">
                <a href="{{ url('/dashboard') }}" class="hover:text-orange-500"><i class="fas fa-home"></i> Home</a>
                <a href="{{ url('/about') }}" class="hover:text-orange-500"><i class="fas fa-info-circle"></i>About</a>
                <a href="{{ url('/price') }}" class="hover:text-orange-500"><i class="fas fa-tags"></i> Pricing</a>
                <a href="{{ url('/services') }}" class="hover:text-orange-500"><i class="fas fa-tools"></i> Services</a>
                <a href="{{ url('purchasePlan') }}" class="hover:text-orange-500"><i class="fas fa-shopping-cart"></i> Purchaseplan</a>
                <a href="{{ url('/contact') }}" class="hover:text-orange-500"><i class="fas fa-phone-alt"></i> Contact</a>

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
            </nav>

            <!-- MOBILE BUTTON -->
            <button id="menuBtn" class="md:hidden text-3xl">
                ☰
            </button>
        </div>

        <!-- MOBILE MENU -->
        <div id="mobileMenu" class="hidden md:hidden bg-black border-t border-gray-800">
            <div class="flex flex-col space-y-4 p-6 text-sm uppercase font-medium">
                <a href="{{ url('/dashboard') }}" class="hover:text-orange-500"><i class="fas fa-home"></i> Home</a>
                <a href="{{ url('/about') }}" class="hover:text-orange-500"><i class="fas fa-info-circle"></i>About</a>
                <a href="{{ url('/price') }}" class="hover:text-orange-500"><i class="fas fa-tags"></i> Pricing</a>
                <a href="{{ url('/services') }}" class="hover:text-orange-500"><i class="fas fa-tools"></i> Services</a>
                <a href="{{ url('purchasePlan') }}" class="hover:text-orange-500"><i class="fas fa-shopping-cart"></i> Purchaseplan</a>
                <a href="{{ url('/contact') }}" class="hover:text-orange-500"><i class="fas fa-phone-alt"></i> Contact</a>
                @auth

                {{-- Mobile + Desktop Responsive Profile --}}
                <li
                    class="flex items-center justify-between gap-3 bg-gray-800 px-3 py-2 rounded-2xl border border-gray-700 w-full sm:w-auto">

                    <div class="flex items-center gap-3 min-w-0">

                        {{-- Avatar --}}
                        <div
                            class="w-10 h-10 min-w-[40px] rounded-full bg-yellow-500 text-black flex items-center justify-center font-bold uppercase">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>

                        {{-- User Info --}}
                        <div class="min-w-0">

                            <p class="text-sm font-semibold text-white truncate">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-xs text-gray-400 truncate max-w-[140px] sm:max-w-[200px]">
                                {{ Auth::user()->email }}
                            </p>

                        </div>
                    </div>
                </li>

                {{-- Logout --}}
                <li class="w-full sm:w-auto">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl transition w-full sm:w-auto">
                            Logout
                        </button>
                    </form>

                </li>

                @else

                {{-- Login --}}
                <li class="w-full sm:w-auto">

                    <a href="{{ route('login') }}"
                        class="block text-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl transition w-full sm:w-auto">
                        Login
                    </a>

                </li>

                @endauth

            </div>
    </header>
    <!-- SCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuBtn = document.getElementById("menuBtn");
            const mobileMenu = document.getElementById("mobileMenu");

            menuBtn.addEventListener("click", function() {
                mobileMenu.classList.toggle("hidden");
            });
        });
    </script>

</body>

</html>