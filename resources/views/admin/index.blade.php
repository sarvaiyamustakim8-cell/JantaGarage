@extends('admin.layout.master')

@section('content')

<div class="px-4 sm:px-6 lg:px-8">

    <!-- Heading -->
    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-6 text-gray-800">
        Dashboard
    </h2>

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

        <!-- Users -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-4 sm:p-5 lg:p-6 rounded-2xl shadow-lg hover:scale-105 transition duration-300 w-full">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-sm sm:text-base lg:text-lg font-semibold">Users</h3>
                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold mt-2 break-words">
                        {{ $users }}
                    </p>
                </div>
                <div class="text-2xl sm:text-3xl lg:text-4xl">👤</div>
            </div>
        </div>

        <!-- Orders -->
        <div class="bg-gradient-to-r from-green-500 to-green-700 text-white p-4 sm:p-5 lg:p-6 rounded-2xl shadow-lg hover:scale-105 transition duration-300 w-full">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-sm sm:text-base lg:text-lg font-semibold">Orders</h3>
                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold mt-2 break-words">
                        {{ $orders }}
                    </p>
                </div>
                <div class="text-2xl sm:text-3xl lg:text-4xl">📦</div>
            </div>
        </div>

        <!-- Services -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-700 text-white p-4 sm:p-5 lg:p-6 rounded-2xl shadow-lg hover:scale-105 transition duration-300 w-full">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-sm sm:text-base lg:text-lg font-semibold">Services</h3>
                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold mt-2">
                        {{ $ProductItems }}
                    </p>
                </div>
                <div class="text-2xl sm:text-3xl lg:text-4xl">🛠️</div>
            </div>
        </div>

    </div>

</div>

@endsection