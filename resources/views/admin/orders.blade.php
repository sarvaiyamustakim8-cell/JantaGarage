@extends('admin.layout.master')

@section('content')

<div class="p-4 sm:p-6">

    <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6">Order List</h2>
    {{-- SEARCH FORM --}}
    <div class="bg-white shadow rounded-xl p-4 mb-6">
        <form method="GET" action="" class="flex flex-col sm:flex-row gap-3">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by user name or email..."
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                Search
            </button>

            <a href="{{ url()->current() }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg text-center">
                Reset
            </a>

        </form>
    </div>

    <div class="hidden md:block bg-white shadow rounded-xl">

        <div class="overflow-x-auto">

            <table class="min-w-full text-sm text-gray-700 table-auto">

                <thead class="bg-gray-800 text-white text-xs uppercase">
                    <tr>
                        <th class="px-6 py-3 w-20 text-left">ID</th>
                        <th class="px-6 py-3 text-left">User</th>
                        <th class="px-6 py-3 text-left">Service</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">payment</th>
                        <th class="px-6 py-3 text-left">Date</th>
                        <th class="px-6 py-3 w-40 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($orders as $order)
                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-3 font-medium whitespace-nowrap">
                            #{{ $order->id }}
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $order->name ?? 'Guest' }}
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $order->service }}
                        </td>

                        <td class="px-6 py-3">
                            @if($order->payment_status == 'pending')
                            <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                Pending
                            </span>
                            @elseif($order->payment_status == 'paid')
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                paid
                            </span>
                            @else
                            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                Cancelled
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $order->payment_method }}
                        </td>

                        <td class="px-6 py-3 text-gray-500 whitespace-nowrap">
                            {{ $order->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4 text-center">

                            <div class="flex items-center justify-center gap-2">

                                <a href="{{ route('admin.editorder.edit', $order->id) }}"
                                    class="min-w-[80px] inline-flex items-center justify-center bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-yellow-500 hover:to-amber-600 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                                    Edit
                                </a>

                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Delete this order?')"
                                        class="min-w-[80px] inline-flex items-center justify-center bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                                        Delete
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">
                            No orders found
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
    {{$orders->links()}}

    <div class="grid gap-4 md:hidden">

        @forelse($orders as $order)
        <div class="bg-white shadow rounded-xl p-4">

            <div class="flex justify-between mb-2">
                <span class="font-semibold">#{{ $order->id }}</span>
                <span class="text-xs text-gray-500">
                    {{ $order->created_at->format('d M Y') }}
                </span>
            </div>

            <p><strong>User:</strong> {{ $order->name ?? 'Guest' }}</p>
            <p><strong>Service:</strong> {{ $order->service }}</p>

            <div class="mt-2">
                @if($order->status == 'pending')
                <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                    Pending
                </span>
                @elseif($order->status == 'completed')
                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                    Completed
                </span>
                @else
                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                    Cancelled
                </span>
                @endif
            </div>

            <div class="flex gap-2 mt-3">

                <a href="{{ route('admin.editorder.edit', $order->id) }}"
                    class="flex-1 bg-yellow-400 text-white text-center py-1 rounded text-sm">
                    Edit
                </a>

                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="w-full bg-red-500 text-white py-1 rounded text-sm"
                        onclick="return confirm('Delete this order?')">
                        Delete
                    </button>
                </form>

            </div>
        </div>
        @empty
        <p class="text-center text-gray-500">No orders found</p>
        @endforelse

    </div>

</div>
@endsection