<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md sm:max-w-lg bg-white p-5 sm:p-6 rounded-2xl shadow-lg">

            <h2 class="text-lg sm:text-xl font-bold mb-4 text-gray-800 text-center">
                Edit Order
            </h2>

            {{-- Success Message --}}
            @if(session('success'))
            <p class="text-green-600 text-sm mb-3 text-center">
                {{ session('success') }}
            </p>
            @endif

            {{-- Error Messages --}}
            @if($errors->any())
            <div class="bg-red-100 text-red-600 text-sm p-3 rounded mb-4">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('admin.editorder.update', $order->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- NAME -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Name
                    </label>
                    <input type="text" name="name" value="{{ $order->name }}"
                        class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none text-sm">
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ $order->email }}"
                        class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none text-sm">
                </div>

                <!-- BUTTON -->
                <div class="flex flex-col sm:flex-row gap-3 mt-4">

                    <button type="submit"
                        class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition">
                        Update
                    </button>

                    <a href="{{ url()->previous() }}"
                        class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>