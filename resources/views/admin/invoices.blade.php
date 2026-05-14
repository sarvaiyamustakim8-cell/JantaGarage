@extends('admin.layout.master')

@section('content')

<div class="p-4 sm:p-6 max-w-3xl mx-auto">

  <h2 class="text-2xl font-bold text-gray-800 mb-6">
    Create Invoice
  </h2>

  <form action="{{ route('admin.invoices.store') }}" method="POST"
    class="bg-white p-6 rounded-xl shadow space-y-5">
    @csrf

    <!-- CUSTOMER -->
    <div class="grid sm:grid-cols-2 gap-4">
      <input type="text" name="name" placeholder="Full Name">
      <input type="email" name="email" placeholder="Email">
      <input type="text" name="contact" placeholder="Phone">
    </div>

    <div>
      <h4 class="font-semibold mb-2">Select Services</h4>

      <div class="grid sm:grid-cols-2 gap-2">
        @foreach($productItems as $item)
        <label>
          <div id="hiddenItems"></div>
          <input type="checkbox"
            class="productItems"
            value="{{ $item->id }}"
            data-name="{{ $item->name }}"
            data-price="{{ $item->price }}">
          {{ $item->name }} - ₹{{ $item->price }}
        </label>
        @endforeach
      </div>
    </div>

    <!-- DYNAMIC ITEMS -->
    <div id="serviceItems" class="space-y-3"></div>

    <!-- TOTAL -->
    <div>
      <label>Total Amount (₹)</label>
      <input type="text" id="totalAmount" name="amount"
        class="w-full border px-3 py-2 rounded bg-gray-100" readonly>
    </div>

    <!-- STATUS -->
    <div class="grid sm:grid-cols-2 gap-4">
      <select name="status" class="border px-3 py-2 rounded">
        <option value="pending">Pending</option>
        <option value="paid">Paid</option>
      </select>

      <input type="date" name="date" class="border px-3 py-2 rounded">
    </div>

    <button type="submit"
      class="bg-blue-500 text-white px-5 py-2 rounded">
      Save Invoice
    </button>

  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {

    const services = document.querySelectorAll('.productItems');
    const container = document.getElementById('serviceItems');
    const totalField = document.getElementById('totalAmount');
    const hiddenContainer = document.getElementById('hiddenItems');

    function updateHidden() {
      hiddenContainer.innerHTML = '';

      document.querySelectorAll('.amount').forEach((input, index) => {
        hiddenContainer.innerHTML += `
        <input type="hidden" name="items[${index}][name]" value="${input.dataset.name}">
        <input type="hidden" name="items[${index}][price]" value="${input.dataset.price}">
        <input type="hidden" name="items[${index}][amount]" value="${input.value}">
      `;
      });
    }

    function calculateTotal() {
      let total = 0;

      document.querySelectorAll('.amount').forEach(input => {
        let val = parseFloat(input.value);
        if (!isNaN(val)) total += val;
      });

      totalField.value = total;
    }

    services.forEach(service => {

      service.addEventListener('change', function() {

        if (this.checked) {

          let div = document.createElement('div');
          div.setAttribute('data-id', this.value);
          div.classList.add('flex', 'justify-between', 'items-center', 'border', 'p-3', 'rounded');

          div.innerHTML = `
          <span>${this.dataset.name} (₹${this.dataset.price})</span>

          <input type="number"
            class="amount"
            value="${this.dataset.price}"
            data-name="${this.dataset.name}"
            data-price="${this.dataset.price}">
        `;

          container.appendChild(div);

        } else {
          let item = container.querySelector('[data-id="' + this.value + '"]');
          if (item) item.remove();
        }

        updateHidden();
        calculateTotal();
      });

    });

    container.addEventListener('input', function(e) {
      if (e.target.classList.contains('amount')) {
        updateHidden();
        calculateTotal();
      }
    });

    // 🔥 FORCE BEFORE SUBMIT (VERY IMPORTANT)
    document.querySelector('form').addEventListener('submit', function() {
      updateHidden();
      calculateTotal();
    });

  });
</script>
@endsection