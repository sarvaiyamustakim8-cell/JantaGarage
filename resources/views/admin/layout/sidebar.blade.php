<aside id="sidebar"
  class="fixed sm:static top-0 left-0 h-full w-64 bg-gray-800 text-white p-4
  -translate-x-full sm:translate-x-0 transform transition-transform duration-300
  z-50 sm:z-auto">

  <!-- CLOSE BUTTON (mobile only) -->
  <div class="sm:hidden flex justify-end mb-4">
    <button onclick="toggleSidebar()" class="text-white text-2xl">✕</button>
  </div>

  <ul class="space-y-3">

    <li><a href="{{ route('admin.index') }}" class="block p-2 rounded hover:bg-gray-700">Dashboard</a></li>
    <li><a href="{{ route('admin.user') }}" class="block p-2 rounded hover:bg-gray-700">Users</a></li>
    <li><a href="{{ route('admin.orders') }}" class="block p-2 rounded hover:bg-gray-700">Orders</a></li>
    <li><a href="{{ route('admin.list') }}" class="block p-2 rounded hover:bg-gray-700">Invoices</a></li>
    <li><a href="{{ route('admin.productItem') }}" class="block p-2 rounded hover:bg-gray-700">Product</a></li>

  </ul>

</aside>