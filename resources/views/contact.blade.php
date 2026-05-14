<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Janta Garage</title>

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
                Contact Janta Garage
            </span>

            <h2 class="mt-5 text-4xl sm:text-5xl md:text-6xl font-extrabold text-yellow-400">
                Contact Us
            </h2>

            <p class="mt-4 text-gray-300 text-sm sm:text-lg max-w-2xl mx-auto">
                We’re ready to help keep your motorcycle smooth, safe, and road-ready.
            </p>

        </div>
    </section>



    <!-- CONTACT SECTION -->
    <section
        class="px-4 sm:px-6 md:px-12 lg:px-20 py-20 bg-gradient-to-b from-gray-950 via-black to-gray-900 text-white">

        <div class="grid lg:grid-cols-2 gap-10 max-w-7xl mx-auto">

            <!-- CONTACT FORM -->
            <div class="bg-[#181818] rounded-3xl shadow-2xl p-6 sm:p-8">

                <h3 class="text-3xl font-bold text-yellow-400 mb-2">
                    Send Message
                </h3>

                <p class="text-gray-400 mb-8">
                    Fill the form and we’ll contact you soon.
                </p>

                <form method="POST" action="/contact" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <input type="text" name="name" placeholder="Your Name"
                            class="w-full p-4 rounded-xl bg-black border border-gray-700 text-white focus:border-yellow-400 focus:outline-none">
                        @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <input type="email" name="email" placeholder="Your Email"
                            class="w-full p-4 rounded-xl bg-black border border-gray-700 text-white focus:border-yellow-400 focus:outline-none">
                        @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div>
                        <input type="text" name="subject" placeholder="Subject"
                            class="w-full p-4 rounded-xl bg-black border border-gray-700 text-white focus:border-yellow-400 focus:outline-none">
                        @error('subject')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <input type="number" name="contact" placeholder="Phone Number"
                            class="w-full p-4 rounded-xl bg-black border border-gray-700 text-white focus:border-yellow-400 focus:outline-none">
                        @error('contact')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <textarea name="message" rows="5" placeholder="Your Message"
                            class="w-full p-4 rounded-xl bg-black border border-gray-700 text-white focus:border-yellow-400 focus:outline-none"></textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-yellow-400 text-black py-4 rounded-xl font-bold hover:bg-yellow-300 transition shadow-lg">
                        Send Message
                    </button>

                </form>
            </div>



            <!-- CONTACT INFO -->
            <div class="flex flex-col justify-center">

                <h3 class="text-4xl font-bold text-yellow-400 mb-4">
                    Get In Touch
                </h3>

                <p class="text-gray-400 leading-8 mb-8">
                    Visit our garage or call us anytime for bike servicing,
                    repair work, maintenance, and support.
                </p>

                <div class="space-y-5">

                    <div class="bg-[#181818] p-5 rounded-2xl">
                        <h4 class="text-yellow-400 font-semibold mb-1">📍 Address</h4>
                        <p class="text-gray-300 text-sm leading-7">
                            J.V. Modi Road, Shiv Bhavani Sector,<br>
                            Parimal Society, Manibhai Chowk,<br>
                            Savar Kundla, Gujarat 364515
                        </p>
                    </div>

                    <div class="bg-[#181818] p-5 rounded-2xl">
                        <h4 class="text-yellow-400 font-semibold mb-1">📞 Phone</h4>
                        <p class="text-gray-300">+91 9574998605</p>
                    </div>

                    <div class="bg-[#181818] p-5 rounded-2xl">
                        <h4 class="text-yellow-400 font-semibold mb-1">📧 Email</h4>
                        <p class="text-gray-300">sarvaiyamustakim8@gmail.com</p>
                    </div>

                    <div class="bg-[#181818] p-5 rounded-2xl">
                        <h4 class="text-yellow-400 font-semibold mb-1">⏰ Timing</h4>
                        <p class="text-gray-300">10:00 AM – 9:00 PM</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <section class="px-4 sm:px-6 md:px-12 lg:px-20 pb-20 bg-black">

        <div class="max-w-7xl mx-auto rounded-3xl overflow-hidden shadow-2xl border border-gray-800">
            <iframe class="w-full h-[450px]"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3714.437142490531!2d71.30623667526703!3d21.33807408039233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be2658007fcb9f5%3A0x260747b6f6076196!2sJ.V.%20Modi%20Road%2C%20Savar%20Kundla%2C%20Gujarat%20364515!5e0!3m2!1sen!2sin!4v1712680000000!5m2!1sen!2sin"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </section>
    {{-- FOOTER --}}
    @include('layout.footer')

</body>

</html>