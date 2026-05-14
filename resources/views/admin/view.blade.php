@extends('admin.layout.master')

@section('content')

<div class="bg-gray-100 min-h-screen p-3 sm:p-6">

  <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-4 sm:p-6">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row justify-between gap-4 border-b pb-4">

      <div class="flex items-center gap-3">
        <img src="{{ asset('images/Janta_Garage_Logo.jpg') }}"
          class="w-14 h-14 sm:w-20 sm:h-20 object-contain">

        <div>
          <h2 class="text-lg sm:text-2xl font-bold">JANTA GARAGE</h2>
          <p class="text-xs sm:text-sm text-gray-500">People Come. Repairs Happen.</p>
        </div>
      </div>

      <div class="text-left sm:text-right">
        <p class="font-bold text-base sm:text-lg">Invoice #{{ $invoice->id }}</p>
        <p class="text-xs text-gray-500">{{ $invoice->created_at->format('d M Y') }}</p>
      </div>

    </div>

    <!-- CUSTOMER -->
    <div class="mt-4 bg-gray-50 p-3 rounded-lg border">
     <div class="grid md:grid-cols-2 gap-6 items-start">

    <!-- LEFT SIDE : BILL TO -->
    <div class="bg-white text-gray-800 rounded-xl p-5 shadow">

        <h2 class="text-xl font-bold mb-3 text-blue-600">Bill To</h2>

        <div class="space-y-2 text-sm">
            <p><b>Name :</b> {{ $invoice->name }}</p>
            <p><b>Email :</b> {{ $invoice->email }}</p>
            <p><b>Mobile :</b> {{ $invoice->contact }}</p>
           
        </div>

    </div>

    <!-- RIGHT SIDE : ADMIN DETAIL -->
    <div class="bg-white text-gray-800 rounded-xl p-5 shadow">

        <h2 class="text-xl font-bold mb-3 text-blue-600">JANTA GARAGE</h2>

        <div class="space-y-2 text-sm">
            <p><b>Owner :</b> Irshad  Sarvaiya</p>
            <p><b>Phone :</b> +91 957499860</p>
            <p><b>Email :</b> jantagarage@gmail.com</p>
            <p><b>Address :</b> savarkundala, Gujarat, India</p>
        </div>

    </div>

</div>
    </div>

    @php
    $services = json_decode($invoice->services, true);
    $subtotal = 0;
    @endphp

    <!-- MOBILE CARDS (IMPORTANT FIX) -->
    <div class="mt-4 space-y-3 sm:hidden">

      @if($services)
      @foreach($services as $service)

      @php
      $name = is_array($service) ? ($service['name'] ?? '') : $service;
      $rate = is_array($service) ? ($service['price'] ?? 0) : 0;
      $subtotal += $rate;
      @endphp

      <div class="border rounded-lg p-3 bg-white shadow-sm">

        <div class="font-medium text-sm">{{ $name }}</div>

        <div class="flex justify-between text-xs mt-2">
          <span>Rate:</span>
          <span>₹{{ number_format($rate, 2) }}</span>
        </div>

        <div class="flex justify-between text-xs font-semibold">
          <span>Amount:</span>
          <span>₹{{ number_format($rate, 2) }}</span>
        </div>

      </div>

      @endforeach
      @endif

    </div>

    <!-- DESKTOP TABLE -->
    <div class="hidden sm:block mt-4 overflow-x-auto">

      <table class="w-full text-sm">

        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="p-2 text-left">Service</th>
            <th class="p-2 text-right">Rate</th>
            <th class="p-2 text-right">Amount</th>
          </tr>
        </thead>

        <tbody>
          @if($services)
          @foreach($services as $service)

          @php
          $name = is_array($service) ? ($service['name'] ?? '') : $service;
          $rate = is_array($service) ? ($service['price'] ?? 0) : 0;
          @endphp

          <tr class="border-b">
            <td class="p-2">{{ $name }}</td>
            <td class="p-2 text-right">₹{{ number_format($rate, 2) }}</td>
            <td class="p-2 text-right">₹{{ number_format($rate, 2) }}</td>
          </tr>

          @endforeach
          @endif
        </tbody>

      </table>

    </div>

    <!-- TOTAL -->
    <div class="flex justify-end mt-5">
      <div class="w-full sm:w-64 bg-gray-50 p-4 rounded-lg border">

        <div class="flex justify-between text-sm">
          <span>Subtotal</span>
          <span>₹{{ number_format($subtotal, 2) }}</span>
        </div>

        <div class="flex justify-between font-bold text-lg border-t mt-2 pt-2">
          <span>Total</span>
          <span class="text-green-600">₹{{ number_format($subtotal, 2) }}</span>
        </div>

      </div>
    </div>

    <!-- STATUS -->
    <div class="mt-4">
      @if($invoice->status == 'paid')
      <span class="bg-green-500 text-white px-3 py-1 rounded text-xs">Paid</span>
      @else
      <span class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">Pending</span>
      @endif
    </div>

    <!-- FOOTER -->
    <div class="text-center text-xs text-gray-500 border-t mt-6 pt-3">
      Thank you for choosing <b>Janta Garage</b> 🏍️
    </div>

    <!-- PRINT
    <button onclick="window.print()"
      class="w-full sm:w-auto mt-4 bg-black text-white py-2 px-4 rounded">
      🖨 Print Invoice
    </button> -->

  </div>
</div>

@endsection