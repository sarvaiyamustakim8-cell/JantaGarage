<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Service - Janta Garage</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: radial-gradient(circle at top, #0b1220, #05070f);
      overflow-x: hidden;
    }

    .glass {
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(18px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      box-shadow: 0 0 40px rgba(250, 204, 21, 0.08);
    }

    .glow:hover {
      box-shadow: 0 0 25px rgba(250, 204, 21, 0.35);
      transform: translateY(-2px);
      transition: 0.2s;
    }

    .input {
      width: 100%;
      padding: 12px 14px;
      border-radius: 12px;
      background: rgba(0, 0, 0, 0.5);
      border: 1px solid #374151;
      outline: none;
      transition: 0.2s;
      color: white;
    }

    .input:focus {
      border-color: #facc15;
      box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.15);
    }

    .service-item {
      transition: 0.2s;
    }

    .service-item:hover {
      transform: scale(1.01);
      background: rgba(255, 255, 255, 0.08);
    }
  </style>
</head>

<body class="text-white">

  @include('layout.header')

  <!-- HERO -->
  <section class="relative h-[340px] flex items-center justify-center bg-cover bg-center"
    style="background-image: url('/images/image.png');">

    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/70 to-black/90"></div>

    <div class="relative text-center px-4 animate-pulse">
      <h2 class="text-5xl font-extrabold text-yellow-400 drop-shadow-lg">
        Book Premium Service
      </h2>
      <p class="mt-3 text-gray-300">
        Fast • Trusted • Professional Bike Care
      </p>
    </div>
  </section>

  <!-- FORM -->
  <section class="px-4 md:px-20 py-16 flex justify-center">

    <div class="w-full max-w-3xl glass rounded-3xl p-6 md:p-10 glow">

      <h3 class="text-2xl font-bold text-yellow-400 mb-6">Service Booking</h3>

      <form method="POST" action="/bookService" class="space-y-5">
        @csrf

        <div class="grid md:grid-cols-2 gap-4">
          <input type="text" name="name" placeholder="Full Name" class="input" />
          <input type="email" name="email" placeholder="Email" class="input" />
        </div>

        <input type="text" name="contact" placeholder="Phone Number" class="input" />
        <input type="date" name="date" class="input" />

        <!-- SERVICES -->
        <div>
          <h4 class="text-lg font-semibold text-yellow-400 mb-3">Select Services</h4>

          <div class="space-y-2 max-h-60 overflow-y-auto p-2 rounded-xl bg-black/30 border border-gray-700">

            @foreach($productItems as $productItem)

            <label class="service-item flex justify-between items-center p-3 rounded-lg cursor-pointer bg-black/40">

              <div class="flex items-center gap-3">
                <input type="checkbox"
                  name="productItem[]"
                  value="{{ $productItem->id }}"
                  data-price="{{ $productItem->price }}"
                  class="service-checkbox accent-yellow-400 scale-110" />

                <span>{{ $productItem->name }}</span>
              </div>

              <span class="text-yellow-400 font-bold">₹{{ $productItem->price }}</span>

            </label>

            @endforeach

          </div>
        </div>

        <!-- TOTAL -->
        <div class="flex justify-between items-center p-4 rounded-xl border border-yellow-400 bg-black/50">
          <span class="text-yellow-300 font-semibold">Total Amount</span>
          <span class="text-2xl font-bold text-yellow-400">₹<span id="totalAmount">0</span></span>
        </div>

        <!-- PAYMENT -->
        <select id="payment_method" name="payment_method" class="input">
          <option value="Cash">Cash</option>
          <option value="UPI">UPI</option>
          <option value="Card">Card</option>
        </select>

        <!-- BUTTON -->
        <button type="button" id="bookBtn"
          class="w-full py-3 rounded-xl font-bold text-black bg-gradient-to-r from-yellow-400 to-yellow-500 hover:scale-105 transition">
          Confirm & Pay
        </button>

        <button type="submit" id="realSubmit" hidden></button>

      </form>

    </div>
  </section>

  @include('layout.footer')

  <script>
    document.addEventListener("DOMContentLoaded", function() {

      const checkboxes = document.querySelectorAll('.service-checkbox');
      const totalBox = document.getElementById('totalAmount');

      function calculateTotal() {
        let total = 0;
        checkboxes.forEach(box => {
          if (box.checked) total += parseFloat(box.dataset.price);
        });
        totalBox.innerText = total.toFixed(2);
      }

      checkboxes.forEach(box => box.addEventListener('change', calculateTotal));

      const btn = document.getElementById("bookBtn");
      const submitBtn = document.getElementById("realSubmit");
      const payment = document.getElementById("payment_method");
      const form = document.querySelector("form");

      btn.addEventListener("click", function() {

        let method = payment.value;
        let total = parseFloat(totalBox.innerText);

        if (total <= 0) {
          alert("Please select service");
          return;
        }

        if (method === "Cash") {
          submitBtn.click();
          return;
        }

        var options = {
          key: "rzp_test_SlGoH2K4OZVxxt",
          amount: Math.round(total * 100),
          currency: "INR",
          name: "Janta Garage", 
          description: "Bike Service Booking",

          handler: function(response) {
            let pay = document.createElement("input");
            pay.type = "hidden";
            pay.name = "payment_id";
            pay.value = response.razorpay_payment_id;
            form.appendChild(pay);
            submitBtn.click();
          }
        };

        var rzp = new Razorpay(options);
        rzp.open();

      });

    });
  </script>

</body>

</html>