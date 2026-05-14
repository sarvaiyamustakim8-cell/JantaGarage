<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Mail\BookingMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductItem;


class BookServiceController extends Controller
{
    //
    function index(Request $request)
    {
        $productItems = ProductItem::all();
        return view('bookService', compact('productItems'));
    }
    // BookServiceController.php
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required',
            'date' => 'required|date',
            'productItem' => 'required|array',
            'payment_method' => 'required'
        ]);

        $ids = $request->productItem;

        $items = ProductItem::whereIn('id', $ids)->get();

        if ($items->isEmpty()) {
            return back()->with('error', 'No valid service selected.');
        }

        $services = $items->pluck('name')->toArray();
        $total = $items->sum('price');

        $method = $request->payment_method;
        $payment_status = 'pending';
        $paymentId = null;

        if ($method == 'Cash') {
            $paymentId = 'CASH-' . time();
            $payment_status = 'pending';
        } elseif ($method == 'UPI') {
            $paymentId = 'UPI-' . time();
            $payment_status = 'paid';
        } elseif ($method == 'Card') {
            $paymentId = 'CARD-' . time();
            $payment_status = 'paid';
        } elseif ($method == 'Razorpay') {
            $paymentId = $request->razorpay_payment_id ?? null;
            $payment_status = $paymentId ? 'paid' : 'failed';
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'date' => $request->date,
            'service' => implode(', ', $services),
            'amount' => $total,
            'status' => 'pending',
            'payment_method' => $method,
            'payment_status' => $payment_status,
            'payment_id' => $paymentId,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'date' => $request->date,
            'services' => $services,
            'amount' => $total,
            'payment_method' => $method,
            'payment_status' => $payment_status,
            'paymentId' => $paymentId
        ];

        Mail::send('mail', $data, function ($message) {
            $message->to('sarvaiyamustakim8@gmail.com')
                ->subject('New Service Booking');
        });

        return back()->with('success', 'Booking Submitted Successfully!');
    }
 
}
