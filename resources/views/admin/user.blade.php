@extends('admin.layout.master')

@section('content')

<div class="p-4 sm:p-6">

  <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6">
    User List
  </h2>

  {{-- SEARCH FORM --}}
  <div class="bg-white p-4 rounded-xl shadow mb-6">
    <form method="GET" action="" class="flex flex-col sm:flex-row gap-3">

      <input 
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search by name or email..."
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"
      >

      <button 
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
      >
        Search
      </button>

      <a href="{{ url()->current() }}"
        class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg text-center">
        Reset
      </a>

    </form>
  </div>

  <!-- DESKTOP TABLE -->
  <div class="hidden md:block bg-white shadow rounded-xl overflow-hidden">

    <table class="min-w-full text-sm text-gray-700">

      <thead class="bg-gray-800 text-white text-xs uppercase">
        <tr>
          <th class="px-6 py-3 text-left">ID</th>
          <th class="px-6 py-3 text-left">Name</th>
          <th class="px-6 py-3 text-left">Email</th>
          <th class="px-6 py-3 text-center">Action</th>
        </tr>
      </thead>

      <tbody class="divide-y">
        @forelse($users as $user)
        <tr class="hover:bg-gray-50 transition">

          <td class="px-6 py-3 font-medium whitespace-nowrap">
            #{{ $user->id }}
          </td>

          <td class="px-6 py-3 whitespace-nowrap">
            {{ $user->name ?? 'Guest' }}
          </td>

          <td class="px-6 py-3 break-all text-sm text-gray-600">
            {{ $user->email }}
          </td>

          <td class="px-6 py-3 text-center">
            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 text-xs rounded-md"
                onclick="return confirm('Delete this user?')">
                Delete
              </button>
            </form>
          </td>

        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center py-6 text-gray-500">
            No users found
          </td>
        </tr>
        @endforelse
      </tbody>

    </table>

  </div>

  <!-- MOBILE CARDS -->
  <div class="grid gap-4 md:hidden">

    @forelse($users as $user)
    <div class="bg-white shadow rounded-xl p-4 space-y-2">

      <div class="flex justify-between">
        <span class="font-semibold text-gray-800">#{{ $user->id }}</span>
      </div>

      <div>
        <p class="text-xs text-gray-500">Name</p>
        <p class="font-medium">{{ $user->name ?? 'Guest' }}</p>
      </div>

      <div>
        <p class="text-xs text-gray-500">Email</p>
        <p class="text-sm break-all">{{ $user->email }}</p>
      </div>

      <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit"
          class="w-full mt-2 bg-red-500 hover:bg-red-600 text-white py-2 text-sm rounded-md"
          onclick="return confirm('Delete this user?')">
          Delete
        </button>
      </form>

    </div>

    @empty
    <p class="text-center text-gray-500">No users found</p>
    @endforelse

  </div>

  {{-- PAGINATION --}}
  <div class="mt-6">
    {{ $users->appends(request()->query())->links() }}
  </div>

</div>

@endsection