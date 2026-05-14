<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Janta Garage</title>

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
  <section class="relative h-[420px] flex items-center justify-center bg-cover bg-center overflow-hidden"
    style="background-image: url('/images/image.png');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/75"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4">
      <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-yellow-400 drop-shadow-lg">
        About Janta Garage
      </h2>
      <p class="mt-4 text-gray-300 text-sm sm:text-lg max-w-2xl mx-auto">
        Trusted Motorcycle Repair & Premium Bike Care Services
      </p>

      <a href="#about"
        class="inline-block mt-6 px-6 py-3 bg-yellow-400 text-black font-semibold rounded-full hover:bg-yellow-300 transition">
        Explore More
      </a>
    </div>
  </section>


  <!-- About Section -->
  <section id="about"
    class="px-4 sm:px-6 md:px-12 lg:px-20 py-16 bg-gradient-to-b from-gray-950 via-black to-gray-900 text-white">

    <div class="grid md:grid-cols-2 gap-12 items-center">

      <!-- Image -->
      <div class="overflow-hidden rounded-3xl shadow-2xl">
        <img src="/images/Janta-Garage.png" alt="Garage Image"
          class="w-full h-full object-cover hover:scale-110 transition duration-700">
      </div>

      <!-- Text -->
      <div>
        <h3 class="text-4xl font-bold text-yellow-400 mb-6">
          Who We Are
        </h3>

        <p class="text-gray-300 leading-8 mb-5 text-lg">
          Janta Garage is a trusted motorcycle repair and servicing center committed to
          delivering high-quality maintenance and repair solutions.
        </p>

        <p class="text-gray-400 leading-8 mb-8">
          With years of experience, our expert mechanics ensure your bike runs smoothly,
          safely, and efficiently every day.
        </p>

        <!-- Highlights -->
        <div class="grid sm:grid-cols-2 gap-4">
          <div class="bg-[#1e1e1e] p-4 rounded-xl">
            <h4 class="text-yellow-400 font-semibold">✔ Expert Team</h4>
            <p class="text-gray-400 text-sm mt-1">Certified and skilled mechanics.</p>
          </div>

          <div class="bg-[#1e1e1e] p-4 rounded-xl">
            <h4 class="text-yellow-400 font-semibold">✔ Quality Work</h4>
            <p class="text-gray-400 text-sm mt-1">Premium service standards.</p>
          </div>
        </div>
      </div>

    </div>
  </section>


  <!-- Mission Vision -->
  <section class="px-4 sm:px-6 md:px-12 lg:px-20 py-16 bg-black">

    <div class="grid md:grid-cols-2 gap-8">

      <!-- Mission -->
      <div
        class="bg-[#1c1c1c] p-8 rounded-3xl shadow-xl hover:shadow-yellow-500/20 hover:-translate-y-2 transition duration-300">
        <h3 class="text-3xl font-bold text-yellow-400 mb-4">Our Mission</h3>
        <p class="text-gray-300 leading-7">
          To deliver reliable motorcycle repair services with honesty, transparency,
          and complete customer satisfaction.
        </p>
      </div>

      <!-- Vision -->
      <div
        class="bg-[#1c1c1c] p-8 rounded-3xl shadow-xl hover:shadow-yellow-500/20 hover:-translate-y-2 transition duration-300">
        <h3 class="text-3xl font-bold text-yellow-400 mb-4">Our Vision</h3>
        <p class="text-gray-300 leading-7">
          To become the most trusted and preferred bike service center by offering
          excellent service and modern solutions.
        </p>
      </div>

    </div>

  </section>


  <!-- Why Choose Us -->
  <section class="px-4 sm:px-6 md:px-12 lg:px-20 py-16 bg-gradient-to-b from-gray-900 to-black text-center">

    <h3 class="text-4xl font-bold text-yellow-400 mb-12">
      Why Choose Us
    </h3>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Card 1 -->
      <div
        class="bg-[#1e1e1e] p-8 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-yellow-500/20 transition">
        <div class="text-5xl mb-4">🔧</div>
        <h4 class="text-2xl font-bold mb-2">Expert Mechanics</h4>
        <p class="text-gray-400">Professional and experienced bike technicians.</p>
      </div>

      <!-- Card 2 -->
      <div
        class="bg-[#1e1e1e] p-8 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-yellow-500/20 transition">
        <div class="text-5xl mb-4">💰</div>
        <h4 class="text-2xl font-bold mb-2">Affordable Pricing</h4>
        <p class="text-gray-400">Top quality service at budget-friendly rates.</p>
      </div>

      <!-- Card 3 -->
      <div
        class="bg-[#1e1e1e] p-8 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-yellow-500/20 transition">
        <div class="text-5xl mb-4">⚡</div>
        <h4 class="text-2xl font-bold mb-2">Fast Service</h4>
        <p class="text-gray-400">Quick turnaround time with trusted results.</p>
      </div>

    </div>

  </section>
  {{-- FOOTER --}}
  @include('layout.footer')
</body>

</html>