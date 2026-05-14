<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Janta Garage</title>
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
                <img src="{{ asset('images/Janta Garage vintage logo design.png') }}" class="h-12">
                <div class="text-left">
                    <h1 class="text-2xl font-bold text-[#f7941d] uppercase">Janta Garage</h1>
                    <p class="text-xs text-gray-500 uppercase">Garage Billing Software</p>
                </div>
            </div>
        </div>

        <!-- FORM SAME (NO CHANGE IN LOGIC) -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name"
                    class="block mt-1 w-full px-4 py-2 border border-gray-200 rounded focus:ring-orange-500"
                    :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email"
                    class="block mt-1 w-full px-4 py-2 border border-gray-200 rounded focus:ring-orange-500"
                    :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" name="password" type="password"
                    class="block mt-1 w-full px-4 py-2 border border-gray-200 rounded focus:ring-orange-500"
                    required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                    class="block mt-1 w-full px-4 py-2 border border-gray-200 rounded focus:ring-orange-500"
                    required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-[#2a435d] text-white font-bold py-3 rounded uppercase hover:bg-[#1e3144] transition">
                Register
            </button>

            <!-- Login Link -->
            <p class="text-sm text-center mt-4 text-gray-500">
                Already registered?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
            </p>

        </form>
    </div>

</body>

</html>