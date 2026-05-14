<!-- resources/views/payment.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Pay Now</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<h2>Pay ₹{{ $order->amount }}</h2>

<button id="rzp-button">Pay Now</button>

<form action="{{ route('razorpay.success') }}" method="POST">
  
  
      @csrf
    <input type="hidden" name="order_id" value="{{ $order->id }}">
    <input type="hidden" name="razorpay_payment_id" id="payment_id">
</form>

<script>
var options = {
    "key": "{{ env('RAZORPAY_KEY') }}",
    "amount": "{{ $order->amount * 100 }}",
    "currency": "INR",
    "name": "Janta Garage",
    "description": "Service Booking Payment",
    "handler": function (response){
        document.getElementById('payment_id').value = response.razorpay_payment_id;
        document.getElementById('success-form').submit();
    },
    "theme": {
        "color": "#facc15"
    }
};

var rzp1 = new Razorpay(options);

document.getElementById('rzp-button').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

</body>
</html>