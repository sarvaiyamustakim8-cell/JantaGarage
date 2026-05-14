<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Janta Garage</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #1a1a1a;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="text-white">

    {{-- HEADER --}}
    @include('layout.header')

    <!-- Hero Section -->
    <section class="relative h-[300px] flex items-center justify-center bg-cover bg-center"
        style="background-image: url('/images/image.png');">

        <div class="absolute inset-0 bg-black bg-opacity-70"></div>

        <div class="relative text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-yellow-400">Our Services</h2>
            <p class="mt-4 text-gray-300">Reliable & Affordable Bike Services</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="px-4 sm:px-6 md:px-12 lg:px-20 py-16 bg-gradient-to-b from-black via-gray-900 to-black text-white">

        <!-- Heading -->
        <div class="text-center mb-14">
            <h3 class="text-4xl md:text-5xl font-extrabold text-yellow-400 tracking-wide">
                Our Premium Services
            </h3>
            <p class="text-gray-400 mt-3 text-sm sm:text-base max-w-2xl mx-auto">
                Reliable bike repair, maintenance, and premium care services by expert mechanics.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card 1 -->
            <div class="bg-[#1c1c1c] rounded-2xl overflow-hidden shadow-lg hover:shadow-yellow-500/30 hover:-translate-y-2 transition duration-300 group">
                <img src="images/General Service.jpg" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-yellow-400 mb-2">General Service</h4>
                    <p class="text-gray-400 text-sm leading-6">Complete bike checkup, engine oil change, and full maintenance service.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-[#1c1c1c] rounded-2xl overflow-hidden shadow-lg hover:shadow-red-500/30 hover:-translate-y-2 transition duration-300 group">
                <img src="images/engin.jpg" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-yellow-400 mb-2">Engine Repair</h4>
                    <p class="text-gray-400 text-sm leading-6">Advanced engine diagnosis, repair, and performance tuning solutions.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-[#1c1c1c] rounded-2xl overflow-hidden shadow-lg hover:shadow-blue-500/30 hover:-translate-y-2 transition duration-300 group">
                <img src="images/Brake.jpg" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-yellow-400 mb-2">Brake & Clutch</h4>
                    <p class="text-gray-400 text-sm leading-6">Brake pad replacement, clutch tuning, and safe riding performance.</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-[#1c1c1c] rounded-2xl overflow-hidden shadow-lg hover:shadow-green-500/30 hover:-translate-y-2 transition duration-300 group">
                <img src="images/tairservice.webp" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-yellow-400 mb-2">Tyre Service</h4>
                    <p class="text-gray-400 text-sm leading-6">Tyre changing, wheel balancing, grease work, and alignment service.</p>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-[#1c1c1c] rounded-2xl overflow-hidden shadow-lg hover:shadow-purple-500/30 hover:-translate-y-2 transition duration-300 group">
                <img src="images/battry.png" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-yellow-400 mb-2">Battery Service</h4>
                    <p class="text-gray-400 text-sm leading-6">Battery checkup, charging, jump-start, and replacement support.</p>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="bg-[#1c1c1c] rounded-2xl overflow-hidden shadow-lg hover:shadow-pink-500/30 hover:-translate-y-2 transition duration-300 group">
                <img src="images/bike1.jpg" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-yellow-400 mb-2">Bike Washing</h4>
                    <p class="text-gray-400 text-sm leading-6">Premium foam wash, polishing, detailing, and shine protection.</p>
                </div>
            </div>

        </div>

    </section>
    <!-- CTA Section -->
    <section class="bg-yellow-400 text-black text-center py-12">
        <h3 class="text-2xl font-bold mb-4">Need a Service?</h3>
        <p class="mb-6">Book your bike service today for the best experience.</p>
        <a href="/contact" class="bg-black text-yellow-400 px-6 py-3 rounded-lg font-semibold hover:bg-gray-900">
            Contact Us
        </a>
    </section>

    {{-- FOOTER --}}
    @include('layout.footer')

</body>

</html>