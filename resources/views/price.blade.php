<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pricing - Janta Garage</title>

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

  <!-- HERO SECTION -->
  <section class="relative min-h-[420px] flex items-center justify-center bg-cover bg-center overflow-hidden"
    style="background-image: url('/images/image.png');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/75"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4">

      <span class="bg-yellow-400 text-black px-4 py-1 rounded-full text-sm font-semibold">
        Affordable Bike Care
      </span>

      <h2 class="mt-5 text-4xl sm:text-5xl md:text-6xl font-extrabold text-yellow-400">
        Our Pricing
      </h2>

      <p class="mt-4 text-gray-300 text-sm sm:text-lg max-w-2xl mx-auto">
        Premium motorcycle services with budget-friendly plans for every rider.
      </p>

      <a href="#plans"
        class="inline-block mt-7 bg-green-600 hover:bg-green-700 px-7 py-3 rounded-xl text-white font-semibold shadow-lg transition">
        View Plans
      </a>

    </div>
  </section>



  <!-- PRICING CARDS -->
  <section id="plans"
    class="px-4 sm:px-6 md:px-12 lg:px-20 py-20 bg-gradient-to-b from-gray-950 via-black to-gray-900 text-white">

    <div class="text-center mb-14">
      <h3 class="text-4xl md:text-5xl font-bold text-yellow-400">
        Service Packages
      </h3>
      <p class="text-gray-400 mt-3">
        Choose the best package for your motorcycle.
      </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">

      <!-- BASIC -->
      <div class="bg-white text-black rounded-3xl p-8 shadow-2xl hover:-translate-y-2 transition">
        <h3 class="text-2xl font-bold mb-4">Premium Service</h3>

        <p class="text-4xl font-extrabold text-green-600 mb-6">₹499</p>

        <ul class="space-y-3 text-sm mb-8">
          <li>✔ Engine Oil Check</li>
          <li>✔ Chain Adjustment</li>
          <li>✔ General Inspection</li>
          <li>✔ Air Pressure Check</li>
        </ul>

        <a href="{{ url('/bookService') }}"
          class="block text-center bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold">
          Book Now
        </a>
      </div>


      <!-- STANDARD -->
      <div class="bg-yellow-400 text-black rounded-3xl p-8 shadow-2xl scale-105 border-4 border-white">
        <span class="bg-black text-white px-3 py-1 rounded-full text-xs font-bold">POPULAR</span>

        <h3 class="text-2xl font-bold mt-4 mb-4">gold Service</h3>

        <p class="text-4xl font-extrabold text-green-700 mb-6">₹1499</p>

        <ul class="space-y-3 text-sm mb-8">
          <li>✔ Full Bike Service</li>
          <li>✔ Engine Repair</li>
          <li>✔ Priority Support</li>
          <li>✔ Premium Wash</li>
        </ul>

        <a href="{{ url('/bookService') }}"
          class="block text-center bg-black hover:bg-gray-900 text-white py-3 rounded-xl font-semibold">
          Book Now
        </a>
      </div>

      <!-- PREMIUM -->
      <div class="bg-white text-black rounded-3xl p-8 shadow-2xl hover:-translate-y-2 transition">
        <h3 class="text-2xl font-bold mb-4">platinume Service</h3>

        <p class="text-4xl font-extrabold text-green-600 mb-6">₹999</p>

        <ul class="space-y-3 text-sm mb-8">
          <li>✔ Engine Check</li>
          <li>✔ Brake Repair</li>
          <li>✔ Full Maintenance</li>
          <li>✔ Washing Included</li>
        </ul>

        <a href="{{ url('/bookService') }}"
          class="block text-center bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold">
          Book Now
        </a>
      </div>

    </div>
  </section>



  <!-- EXTRA SERVICES -->
  <section class="px-4 sm:px-6 md:px-12 lg:px-20 pb-20 bg-black text-white">

    <div class="text-center mb-12">
      <h3 class="text-4xl font-bold text-yellow-400">
        Additional Services
      </h3>
      <p class="text-gray-400 mt-3">
        Quick fixes and extra care services.
      </p>
    </div>

    <div class="max-w-5xl mx-auto overflow-hidden rounded-3xl shadow-2xl border border-gray-800">

      <table class="w-full">

        <thead class="bg-yellow-400 text-black">
          <tr>
            <th class="px-6 py-4 text-left text-lg">Service</th>
            <th class="px-6 py-4 text-right text-lg">Price</th>
          </tr>
        </thead>

        <tbody class="bg-[#181818] divide-y divide-gray-800">

          <tr class="hover:bg-[#222] transition">
            <td class="px-6 py-4">Bike Wash</td>
            <td class="px-6 py-4 text-right text-yellow-400 font-semibold">₹100</td>
          </tr>

          <tr class="hover:bg-[#222] transition">
            <td class="px-6 py-4">Wheel Service</td>
            <td class="px-6 py-4 text-right text-yellow-400 font-semibold">₹100</td>
          </tr>

          <tr class="hover:bg-[#222] transition">
            <td class="px-6 py-4">Battery Replacement</td>
            <td class="px-6 py-4 text-right text-yellow-400 font-semibold">₹1200+</td>
          </tr>

          <tr class="hover:bg-[#222] transition">
            <td class="px-6 py-4">Brake Shoe Replacement</td>
            <td class="px-6 py-4 text-right text-yellow-400 font-semibold">₹300</td>
          </tr>

        </tbody>

      </table>

    </div>

  </section>
  {{-- FOOTER --}}
  @include('layout.footer')
</body>

</html>