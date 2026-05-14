<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Janta Garage</title>
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
                    <p class="text-[10px] text-gray-400 italic">Developed by Mustakim Sarvaiya</p>
                </div>
            </div>
        </div>

        <!-- Info -->
        <p class="text-sm text-gray-600 mb-4 text-center">
            Enter your email and new password to reset your account.
        </p>

        <!-- Form -->
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-1">Email</label>
                <input type="email" name="email"
                    value="{{ old('email', $request->email) }}"
                    class="w-full px-4 py-2 border border-gray-200 rounded focus:ring-1 focus:ring-orange-500"
                    required autofocus>

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-1">New Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border border-gray-200 rounded focus:ring-1 focus:ring-orange-500"
                    required>

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-200 rounded focus:ring-1 focus:ring-orange-500"
                    required>

                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-[#2a435d] text-white font-bold py-3 rounded uppercase hover:bg-[#1e3144] transition">
                Reset Password
            </button>

            <!-- Back -->
            <p class="text-sm text-center mt-4 text-gray-500">
                Back to
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
            </p>

        </form>
    </div>

</body>

</html>