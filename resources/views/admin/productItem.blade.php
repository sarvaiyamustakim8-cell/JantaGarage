@extends('admin.layout.master')

@section('content')

<div class="min-h-screen bg-gray-100 p-4">

  <div class="max-w-5xl mx-auto space-y-6">

    <!-- ================= FORM ================= -->
    <form action="{{ route('admin.productItem.store') }}" method="POST"
      class="bg-white p-5 rounded-2xl shadow space-y-4">
      @csrf

      <h2 class="text-xl font-bold mb-4">Add Product</h2>

      <!-- PRODUCT NAME -->
      <input type="text" name="name"
        class="w-full border px-3 py-2 rounded-lg"
        placeholder="Product Name">

      <!-- ITEMS -->
      <div id="items" class="space-y-3">

        <div class="item-row grid grid-cols-1 sm:grid-cols-4 gap-2">

          <input type="text" name="items[0][name]"
            class="w-full border px-2 py-2 rounded-lg sm:col-span-2"
            placeholder="Item">

          <input type="number" name="items[0][price]"
            class="w-full border px-2 py-2 rounded-lg price"
            placeholder="Price">

          <input type="number" name="items[0][qty]"
            class="w-full border px-2 py-2 rounded-lg qty"
            placeholder="Qty">

          <button type="button"
            onclick="removeItem(this)"
            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg w-full sm:w-auto">
            ✕
          </button>

        </div>

      </div>

      <!-- ADD BUTTON -->
      <button type="button"
        onclick="addItem()"
        class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        + Add Item
      </button>

      <!-- TOTAL -->
      <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg">
        <span class="font-medium text-gray-700">Total:</span>
        <span class="text-green-600 font-bold text-lg">
          ₹ <span id="total">0</span>
        </span>
      </div>

      <!-- SUBMIT -->
      <button type="submit"
        class="w-full bg-black hover:bg-gray-800 text-white py-2 rounded-lg">
        Save
      </button>

    </form>

    <!-- ================= LIST ================= -->
    <div class="bg-white p-5 rounded-2xl shadow">

      <h2 class="text-xl font-bold mb-4">Product List</h2>

      <!-- TABLE -->
      <div class="overflow-x-auto w-full">

        <table class="w-full text-sm border">

          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="p-2 text-left">Product</th>
              <th class="p-2 text-left">Items</th>
              <th class="p-2 text-right">Total</th>
            </tr>
          </thead>

          <tbody>

            @foreach($products as $product)

            @php $total = 0; @endphp

            <tr class="border-b hover:bg-gray-50">

              <!-- PRODUCT NAME -->
              <td class="p-2 font-medium whitespace-nowrap">
                {{ $product->name }}
              </td>

              <!-- ITEMS -->
              <td class="p-2">
                <ul class="space-y-1 text-xs">

                  @foreach($product->items as $item)
                  @php $total += $item->total; @endphp

                  <li class="bg-gray-100 px-2 py-1 rounded">
                    {{ $item->name }}
                    (₹{{ $item->price }} × {{ $item->qty }})
                  </li>

                  @endforeach

                </ul>
              </td>

              <!-- TOTAL -->
              <td class="p-2 text-right font-bold text-green-600 whitespace-nowrap">
                ₹{{ $total }}
              </td>

            </tr>

            @endforeach

          </tbody>

        </table>

      </div>
    </div>

  </div>
</div>

<!-- ================= JS ================= -->
<script>
  let index = 1;

  function addItem() {
    let html = `
    <div class="item-row grid grid-cols-1 sm:grid-cols-4 gap-2 mt-2">

      <input type="text" name="items[${index}][name]"
        class="w-full border px-2 py-2 rounded-lg sm:col-span-2"
        placeholder="Item">

      <input type="number" name="items[${index}][price]"
        class="w-full border px-2 py-2 rounded-lg price"
        placeholder="Price">

      <input type="number" name="items[${index}][qty]"
        class="w-full border px-2 py-2 rounded-lg qty"
        placeholder="Qty">

      <button type="button"
        onclick="removeItem(this)"
        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg w-full sm:w-auto">
        ✕
      </button>

    </div>
  `;

    document.getElementById('items').insertAdjacentHTML('beforeend', html);
    index++;
  }

  function removeItem(btn) {
    btn.closest('.item-row').remove();
    calculateTotal();
  }

  document.addEventListener('input', calculateTotal);

  function calculateTotal() {
    let total = 0;

    document.querySelectorAll('.item-row').forEach(row => {
      let price = parseFloat(row.querySelector('.price')?.value) || 0;
      let qty = parseFloat(row.querySelector('.qty')?.value) || 0;

      total += price * qty;
    });

    document.getElementById('total').innerText = total.toFixed(2);
  }
</script>

@endsection