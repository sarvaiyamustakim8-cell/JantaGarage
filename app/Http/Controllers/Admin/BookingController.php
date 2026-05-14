<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    function show(Request $request)
    {
        $search = $request->search;

    $orders = Order::when($search, function ($query) use ($search) {

        $query->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");

    })->latest()->paginate(5);
        return view('admin.orders', compact('orders'));
    }

    function index(Request $request)
    {
        return view('admin.editorder');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.editorder', compact('order'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $order = Order::findOrFail($id);

        $order->name = $request->name;
        $order->email = $request->email;
        $order->save();

        return redirect()->route('admin.orders')
            ->with('success', 'Order updated successfully');
    }


    function destory($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with('success', 'Deleted successfully');
    }
}
