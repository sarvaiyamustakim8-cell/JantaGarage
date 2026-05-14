<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Janta Garage | Motorcycle Repair</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            background: #111;
            font-family: 'Inter', sans-serif;
            color: white;
            overflow-x: hidden;
        }

        .bg-grunge {
            background: url('{{ asset("images/dark-texture.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        #bgSlider {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .bg-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0;
            transform: scale(1.1);
            transition: opacity 1s ease-in-out, transform 5s ease;
        }

        .bg-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .dark-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.72);
            z-index: 2;
        }

        .text-glow {
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
        }

        .card-style {
            transition: all 0.35s ease;
        }

        .card-style:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 45px rgba(255, 255, 255, 0.07);
        }

        .btn-main {
            transition: all 0.3s ease;
        }

        .btn-main:hover {
            transform: scale(1.05);
        }

        /* Team Image */
        .team-img {
            transition: 0.5s ease;
        }

        .team-img:hover {
            transform: scale(1.05);
        }

        /* Title */
        .section-title {
            letter-spacing: 1px;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #111;
        }

        ::-webkit-scrollbar-thumb {
            background: #facc15;
            border-radius: 20px;
        }

        @media(max-width:768px) {
            .hero-text {
                text-align: center;
            }

            .hero-btn {
                justify-content: center;
            }
        }
    </style>
</head>

<body class="bg-grunge text-white">

    {{-- HEADER --}}
    @include('layout.header')

    {{-- HERO --}}
    <section class="relative h-[650px] flex items-center px-6 md:px-16 overflow-hidden">

        <div id="bgSlider">
            <div class="bg-slide active" data-bg="{{ asset('images/bike-bg1.jpg') }}"></div>
            <div class="bg-slide" data-bg="{{ asset('images/m1.png') }}"></div>
            <div class="bg-slide" data-bg="{{ asset('images/Janta-Garage.png') }}"></div>
        </div>

        <div class="dark-overlay"></div>

        <div class="relative z-10 max-w-7xl mx-auto hero-text">

            <span class="bg-yellow-400 text-black px-4 py-2 rounded-full text-sm font-bold">
                Trusted Since Years
            </span>

            <h1 class="text-5xl md:text-7xl font-extrabold mt-6 leading-tight text-glow">
                Bike Service <span class="text-yellow-400">Experts</span>
            </h1>

            <p class="text-gray-300 text-lg mt-6 max-w-2xl leading-8">
                Professional motorcycle repair, engine solutions,
                washing, maintenance and premium care by expert mechanics.
            </p>

            <div class="mt-8 flex gap-4 flex-wrap hero-btn">
                <a href="{{ url('/bookService') }}"
                    class="btn-main bg-green-600 hover:bg-green-700 px-7 py-3 rounded-xl font-semibold shadow-xl">
                    Book Service
                </a>

                <a href="#plans"
                    class="btn-main border border-white hover:bg-white hover:text-black px-7 py-3 rounded-xl font-semibold">
                    View Plans
                </a>
            </div>

        </div>
    </section>

    {{-- PRICING --}}
    <section id="plans"
        class="px-4 sm:px-6 md:px-12 lg:px-20 py-20 bg-gradient-to-b from-gray-950 via-black to-gray-900">

        <div class="text-center mb-14">
            <h2 class="text-4xl md:text-5xl font-bold text-yellow-400 section-title">
                Service Packages
            </h2>
            <p class="text-gray-400 mt-3">
                Choose your best plan with service validity.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">

            <div class="bg-white text-black rounded-3xl p-8 card-style">
                <h3 class="text-2xl font-bold">Premium Service</h3>
                <p class="text-4xl font-bold text-green-600 mt-3">₹499</p>

                <ul class="mt-6 space-y-3 text-sm">
                    <li>✔ Engine Oil Check</li>
                    <li>✔ Chain Adjustment</li>
                    <li>✔ General Inspection</li>
                    <li>✔ Air Pressure Check</li>
                </ul>

                <a href="{{ url('/bookService?plan=premium') }}"
                    class="block mt-8 bg-green-600 hover:bg-green-700 text-white text-center py-3 rounded-xl font-semibold">
                    Book Premium
                </a>
            </div>

            <div class="bg-yellow-400 text-black rounded-3xl p-8 card-style scale-105 border-4 border-white">
                <span class="bg-black text-white px-3 py-1 rounded-full text-xs font-bold">
                    MOST POPULAR
                </span>

                <h3 class="text-2xl font-bold mt-4">Gold Service</h3>
                <p class="text-4xl font-bold text-green-700 mt-3">₹1499</p>
                <ul class="mt-6 space-y-3 text-sm">
                    <li>✔ Full Bike Service</li>
                    <li>✔ Engine Repair</li>
                    <li>✔ Priority Support</li>
                    <li>✔ Premium Wash</li>
                </ul>

                <a href="{{ url('/bookService?plan=gold') }}"
                    class="block mt-8 bg-black hover:bg-gray-900 text-white text-center py-3 rounded-xl font-semibold">
                    Book Gold
                </a>
            </div>

            <div class="bg-white text-black rounded-3xl p-8 card-style">
                <h3 class="text-2xl font-bold">Platinum Service</h3>
                <p class="text-4xl font-bold text-green-600 mt-3">₹999</p>
                <ul class="mt-6 space-y-3 text-sm">
                    <li>✔ Engine Check</li>
                    <li>✔ Brake Repair</li>
                    <li>✔ Full Maintenance</li>
                    <li>✔ Washing Included</li>
                </ul>

                <a href="{{ url('/bookService?plan=platinum') }}"
                    class="block mt-8 bg-green-600 hover:bg-green-700 text-white text-center py-3 rounded-xl font-semibold">
                    Book Platinum
                </a>
            </div>

        </div>
    </section>

    {{-- TEAM --}}
    <section class="py-20 px-4 sm:px-6 md:px-16 bg-black">

        <div class="text-center mb-14">
            <h2 class="text-4xl md:text-5xl font-bold text-yellow-400">
                Meet Our Team
            </h2>
            <p class="text-gray-400 mt-3">
                Dedicated experts behind Janta Garage success.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-7xl mx-auto">

            <div class="bg-[#161616] rounded-3xl p-5 card-style text-center">
                <img src="{{ asset('images/Irshad.jpg') }}"
                    class="w-full h-72 object-cover rounded-2xl mb-5 grayscale hover:grayscale-0 team-img">

                <h4 class="text-2xl font-bold">Irshad Sarvaiya</h4>
                <p class="text-yellow-400 mt-1">Head Mechanic</p>
            </div>

            <div class="bg-[#161616] rounded-3xl p-5 card-style text-center">
                <img src="{{ asset('images/mustakim.jpeg') }}"
                    class="w-full h-72 object-cover rounded-2xl mb-5 grayscale hover:grayscale-0 team-img">

                <h4 class="text-2xl font-bold">Mustakim Sarvaiya</h4>
                <p class="text-yellow-400 mt-1">Service Specialist</p>
            </div>

            <div class="bg-[#161616] rounded-3xl p-5 card-style text-center">
                <img src="{{ asset('images/mustakim.jpeg') }}"
                    class="w-full h-72 object-cover rounded-2xl mb-5 grayscale hover:grayscale-0 team-img">

                <h4 class="text-2xl font-bold">Mustakim Sarvaiya</h4>
                <p class="text-yellow-400 mt-1">Wiring Specialist</p>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    @include('layout.footer')

    <script>
        let slides = document.querySelectorAll('.bg-slide');
        let index = 0;

        slides.forEach(slide => {
            slide.style.backgroundImage = `url(${slide.dataset.bg})`;
        });

        function changeBackground() {
            slides[index].classList.remove('active');
            index = (index + 1) % slides.length;
            slides[index].classList.add('active');
        }

        setInterval(changeBackground, 3500);
    </script>

</body>

</html>