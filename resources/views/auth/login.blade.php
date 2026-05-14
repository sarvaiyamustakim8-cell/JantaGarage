<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Janta Garage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#5c5c5c] min-h-screen flex items-center justify-end pr-10 lg:pr-32"
    style="background-image: url('/images/Gemini_Generated_Image_cg8tvqcg8tvqcg8t.png'); 
           background-size: cover; 
           background-position: left center;">

    <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md" style="margin-right: -5%;">

        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-2">
                <img src="{{ asset('images/Janta Garage vintage logo design.png') }}" alt="Logo" class="h-12">
                <div class="text-left">
                    <h1 class="text-2xl font-bold text-[#f7941d] leading-none uppercase">Janta Garage</h1>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-tighter">Garage Billing Software</p>
                    <p class="text-[10px] text-gray-400 italic">Developed by Mustakim Sarvaiya.</p>
                </div>
            </div>
        </div>

        <!-- Status message (optional) -->
        @if(session('status'))
        <div class="mb-4 text-green-600 text-center font-semibold">
            {{ session('status') }}
        </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-1">Email</label>
                <input type="email" name="email" placeholder="Email"
                    class="w-full px-4 py-2 border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-orange-500"
                    required autofocus>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-1">Password</label>
                <input type="password" name="password" placeholder="Password"
                    class="w-full px-4 py-2 border border-gray-200 rounded focus:outline-none focus:ring-1 focus:ring-orange-500"
                    required>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me + Forgot -->
            <div class="flex items-center justify-between text-sm mb-6">
                <label class="flex items-center text-gray-500 cursor-pointer">
                    <input type="checkbox" name="remember" class="mr-2"> Remember Me
                </label>
                <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-[#2a435d] text-white font-bold py-3 rounded uppercase tracking-wider hover:bg-[#1e3144] transition duration-200">
                Sign In
            </button>

            <!-- Register Link -->
            <p class="text-sm text-center mt-4 text-gray-500">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
            </p>
        </form>
    </div>
</body>

</html>