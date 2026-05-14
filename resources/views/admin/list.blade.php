@extends('admin.layout.master')

@section('content')

<div class="p-3 sm:p-6 bg-gray-100 min-h-screen">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Invoices List</h2>
        {{-- SEARCH FORM --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-4 mb-6">

            <form method="GET" action="" class="flex flex-col sm:flex-row gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by user name or email..."
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold">
                    Search
                </button>

                <a href="{{ url()->current() }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-xl font-semibold text-center">
                    Reset
                </a>

            </form>

        </div>

        <a href="{{ route('admin.invoices') }}"
            class="w-full sm:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow-lg font-semibold transition duration-200">
            + Add Invoice
        </a>
    </div>

    <!-- Desktop Table -->
    <div class="hidden lg:block bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-700">

                <thead class="bg-gray-800 text-white uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Services</th>
                        <th class="px-6 py-4 text-left">Amount</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($invoices as $invoice)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 font-bold text-gray-800">
                            #{{ $invoice->id }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $invoice->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            {{ $invoice->email }}
                        </td>

                        <td class="px-6 py-4">
                            @php
                            $services = json_decode($invoice->services, true);
                            @endphp

                            @if($services)
                            <div class="space-y-1">
                                @foreach($services as $service)
                                <div class="bg-gray-100 px-3 py-1 rounded-lg text-xs inline-block mr-1 mb-1">
                                    @if(is_array($service))
                                    {{ $service['name'] }} - ₹{{ $service['price'] }}
                                    @else
                                    {{ $service }} - ₹0
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-green-600 font-bold">
                            ₹ {{ $invoice->amount }}
                        </td>

                        <td class="px-6 py-4">
                            @if($invoice->status == 'paid')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Paid
                            </span>
                            @else
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Pending
                            </span>
                            @endif
                        </td>

                        {{-- Replace Action Buttons Section with this --}}

                        <td class="px-6 py-5">

                            <div class="flex gap-2 justify-center">

                                <!-- View -->
                                <a href="{{ route('admin.view',$invoice->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center shadow">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5
                    c4.478 0 8.268 2.943 9.542 7
                    -1.274 4.057-5.064 7-9.542 7
                    -4.477 0-8.268-2.943-9.542-7z" />

                                    </svg>

                                </a>


                                <!-- Download PDF -->
                                <a href="{{ route('admin.invoice.pdf',$invoice->id) }}"
                                    class="bg-green-500 hover:bg-green-600 text-white w-10 h-10 rounded-lg flex items-center justify-center shadow">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2" />

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7 10l5 5 5-5" />

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 15V3" />

                                    </svg>

                                </a>


                                <!-- Delete -->
                                <form action="{{ route('admin.list.destory',$invoice->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete invoice?')"
                                        class="bg-red-500 hover:bg-red-600 text-white w-10 h-10 rounded-lg flex items-center justify-center shadow">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                        a2 2 0 01-1.995-1.858L5 7" />

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10 11v6M14 11v6" />

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" />

                                        </svg>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-10 text-gray-500">
                            No invoices found
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
            {{$invoices->links()}}
        </div>
    </div>

    <!-- Mobile Cards -->
    <div class="grid gap-4 lg:hidden">

        @forelse($invoices as $invoice)

        <div class="bg-white rounded-2xl shadow-lg border p-4 space-y-4">

            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-lg text-gray-800">
                    #{{ $invoice->id }}
                </h3>

                @if($invoice->status == 'paid')
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Paid
                </span>
                @else
                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Pending
                </span>
                @endif
            </div>

            <!-- Info -->
            <div class="space-y-2 text-sm text-gray-700">
                <p><span class="font-semibold">Name:</span> {{ $invoice->name }}</p>
                <p><span class="font-semibold">Email:</span> {{ $invoice->email }}</p>

                <div>
                    <p class="font-semibold mb-1">Services:</p>

                    @php
                    $services = json_decode($invoice->services, true);
                    @endphp

                    @if($services)
                    <div class="flex flex-wrap gap-2">
                        @foreach($services as $service)
                        <span class="bg-gray-100 px-2 py-1 rounded-lg text-xs">
                            @if(is_array($service))
                            {{ $service['name'] }} - ₹{{ $service['price'] }}
                            @else
                            {{ $service }}
                            @endif
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>

                <p class="text-green-600 font-bold text-lg">
                    ₹ {{ $invoice->amount }}
                </p>
            </div>

            {{-- Replace Action Buttons Section with this --}}

            <td class="px-6 py-5">

                <div class="flex gap-2 justify-center">

                    <!-- View -->
                    <a href="{{ route('admin.view',$invoice->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center shadow">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5
                    c4.478 0 8.268 2.943 9.542 7
                    -1.274 4.057-5.064 7-9.542 7
                    -4.477 0-8.268-2.943-9.542-7z" />

                        </svg>

                    </a>


                    <!-- Download PDF -->
                    <a href="{{ route('admin.invoice.pdf',$invoice->id) }}"
                        class="bg-green-500 hover:bg-green-600 text-white w-10 h-10 rounded-lg flex items-center justify-center shadow">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2" />

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 10l5 5 5-5" />

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15V3" />

                        </svg>

                    </a>


                    <!-- Delete -->
                    <form action="{{ route('admin.list.destory',$invoice->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Delete invoice?')"
                            class="bg-red-500 hover:bg-red-600 text-white w-10 h-10 rounded-lg flex items-center justify-center shadow">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                        a2 2 0 01-1.995-1.858L5 7" />

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 11v6M14 11v6" />

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" />

                            </svg>

                        </button>

                    </form>

                </div>

            </td>

            @empty
            <div class="text-center text-gray-500 py-10">
                No invoices found
            </div>
            @endforelse

        </div>
        {{$invoices->links()}}

    </div>

    @endsection