{{-- resources/views/purchasePlan/index.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Plans - Janta Garage</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <style>
        body {
            background: #0b0b0b;
            font-family: 'Inter', sans-serif;
        }

        .card {
            background: linear-gradient(145deg, #181818, #101010);
            border: 1px solid #2d2d2d;
            transition: .35s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            border-color: #facc15;
            box-shadow: 0 15px 35px rgba(250, 204, 21, .12);
        }

        .popular-card {
            background: linear-gradient(135deg, #facc15, #eab308);
            color: #000;
            transform: scale(1.04);
            box-shadow: 0 20px 40px rgba(250, 204, 21, .25);
        }

        .popular-card:hover {
            transform: scale(1.06) translateY(-8px);
        }

        .buy-btn {
            transition: .3s ease;
        }

        .buy-btn:hover {
            transform: scale(1.03);
        }

        .badge {
            letter-spacing: 2px;
            font-size: 12px;
        }
    </style>
</head>

<body class="text-white">

    @include('layout.header')

    @php
    $activePlan = \App\Models\Subscription::where('user_id', auth()->id())
    ->where('status', 'active')
    ->whereDate('end_date', '>=', now())
    ->first();
    @endphp

    {{-- HERO --}}
    <section class="relative h-[320px] flex items-center justify-center bg-cover bg-center"
        style="background-image:url('/images/image.png')">

        <div class="absolute inset-0 bg-black/75"></div>

        <div class="relative text-center px-4">
            <h1 class="text-5xl md:text-6xl font-bold text-yellow-400">Bike Membership</h1>
            <p class="mt-4 text-gray-300 text-lg">
                Save More • Ride Better • Service Smarter
            </p>
        </div>
    </section>


    @if($activePlan)

    {{-- ACTIVE PLAN --}}
    <section class="px-4 sm:px-8 lg:px-16 py-16">

        <div class="max-w-3xl mx-auto bg-[#151515] border border-yellow-400 rounded-3xl p-10 text-center">

            <h2 class="text-4xl font-bold text-yellow-400 mb-8">
                Active Membership
            </h2>

            <div class="space-y-4 text-lg text-gray-300">

                <p>
                    <span class="text-white font-semibold">Plan :</span>
                    {{ $activePlan->plan_name }}
                </p>

                <p>
                    <span class="text-white font-semibold">Price :</span>
                    ₹{{ $activePlan->price }}
                </p>

                <p>
                    <span class="text-white font-semibold">Start Date :</span>
                    {{ $activePlan->start_date }}
                </p>

                <p>
                    <span class="text-white font-semibold">Expiry Date :</span>
                    {{ $activePlan->end_date }}
                </p>

                <p class="text-green-400 font-semibold text-xl">
                    Membership Active
                </p>
            </div>

            <div class="mt-8 bg-red-500/10 border border-red-500 text-red-400 p-4 rounded-2xl">
                You already purchased a membership.
                New membership available after expiry date.
            </div>

        </div>

    </section>

    @else

    {{-- PLAN SECTION --}}
    <section class="px-4 sm:px-8 lg:px-16 py-16">

        <div class="text-center mb-14">
            <h2 class="text-4xl md:text-5xl font-bold text-yellow-400">Choose Your Plan</h2>
            <p class="text-gray-400 mt-3">Affordable maintenance membership for your bike</p>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            {{-- PLAN 1 --}}
            <div class="card rounded-3xl p-8">

                <p class="badge text-gray-400 uppercase">2 Wheeler</p>
                <h2 class="text-4xl font-bold mt-3 text-yellow-400">Membership</h2>

                <div class="mt-6">
                    <p class="line-through text-gray-500 text-2xl">₹8999</p>
                    <h3 class="text-6xl font-bold mt-1">₹5999</h3>
                    <p class="text-gray-400 mt-1">/6 MONTHS (incl. GST)</p>
                </div>

                <p class="mt-5 text-green-400 font-semibold">
                    10% OFF (Upto ₹200 on each invoice)
                </p>

                <ul class="mt-6 space-y-3 text-gray-300 text-sm">
                    <li>✔ Servicing after every 4,000 KMS / 4 months</li>
                    <li>✔ Washing & Polishing (6)</li>
                    <li>✔ Bike Inspections (3)</li>
                    <li>✔ Pick & Drop Facility</li>
                    <li>✔ Engine Diagnose Once</li>
                    <li>✔ Free Consultation</li>
                    <li>✔ Free Rider Gloves</li>
                </ul>

                <button onclick="payNow('membership6',5999)"
                    class="buy-btn mt-8 w-full bg-yellow-400 text-black py-3 rounded-xl font-bold">
                    BUY NOW
                </button>

            </div>


            {{-- PLAN 2 --}}
            <div class="card rounded-3xl p-8">

                <p class="badge text-gray-400 uppercase">2 Wheeler</p>
                <h2 class="text-4xl font-bold mt-3 text-yellow-400">Membership</h2>

                <div class="mt-6">
                    <p class="line-through text-gray-500 text-2xl">₹11299</p>
                    <h3 class="text-6xl font-bold mt-1">₹7999</h3>
                    <p class="text-gray-400 mt-1">/12 MONTHS (incl. GST)</p>
                </div>

                <p class="mt-5 text-green-400 font-semibold">
                    10% OFF (Upto ₹200 on each invoice)
                </p>

                <ul class="mt-6 space-y-3 text-gray-300 text-sm">
                    <li>✔ Servicing after every 4,000 KMS / 4 months</li>
                    <li>✔ Washing & Polishing (12)</li>
                    <li>✔ Bike Inspections (4)</li>
                    <li>✔ Pick & Drop Facility</li>
                    <li>✔ Engine Diagnose Once</li>
                    <li>✔ Free Consultation</li>
                    <li>✔ Free Helmet & Chain Spray</li>
                </ul>

                <button onclick="payNow('membership12',7999)"
                    class="buy-btn mt-8 w-full bg-yellow-400 text-black py-3 rounded-xl font-bold">
                    BUY NOW
                </button>

            </div>


            {{-- POPULAR --}}
            <div class="popular-card rounded-3xl p-8 relative">

                <span
                    class="absolute -top-4 left-1/2 -translate-x-1/2 bg-black text-yellow-400 px-5 py-1 rounded-full text-sm font-bold">
                    Popular
                </span>

                <p class="badge uppercase">2 Wheeler</p>
                <h2 class="text-4xl font-bold mt-3">Membership</h2>

                <div class="mt-6">
                    <p class="line-through text-gray-700 text-2xl">₹15899</p>
                    <h3 class="text-6xl font-bold mt-1">₹10999</h3>
                    <p class="mt-1">/12 MONTHS (incl. GST)</p>
                </div>

                <p class="mt-5 font-semibold">
                    10% OFF (Upto ₹200 on each invoice)
                </p>

                <ul class="mt-6 space-y-3 text-sm">
                    <li>✔ Servicing with Engine Oil every 4,000 KMS</li>
                    <li>✔ Washing & Polishing (12)</li>
                    <li>✔ Bike Inspections (6)</li>
                    <li>✔ Pick & Drop Facility</li>
                    <li>✔ Engine Diagnose Once</li>
                    <li>✔ Free Consultation</li>
                    <li>✔ Free Tracking Bag & Chain Spray</li>
                </ul>

                <button onclick="payNow('popular',10999)"
                    class="buy-btn mt-8 w-full bg-black text-yellow-400 py-3 rounded-xl font-bold">
                    BUY NOW
                </button>

            </div>

        </div>

    </section>

    @endif


    {{-- PAYMENT FORM --}}
    <form id="paymentForm" action="/purchasePlan" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="plan" id="plan">
        <input type="hidden" name="razorpay_payment_id" id="payment_id">
    </form>


    {{-- PAYMENT --}}
    <script>
        function payNow(plan, amount) {

            var options = {
                key: "{{ env('RAZORPAY_KEY') }}",
                amount: amount * 100,
                currency: "INR",
                name: "Janta Garage",
                description: "Membership Payment",

                handler: function(response) {
                    document.getElementById('plan').value = plan;
                    document.getElementById('payment_id').value = response.razorpay_payment_id;
                    document.getElementById('paymentForm').submit();
                },

                theme: {
                    color: "#facc15"
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        }
    </script>

    @include('layout.footer')

</body>

</html>