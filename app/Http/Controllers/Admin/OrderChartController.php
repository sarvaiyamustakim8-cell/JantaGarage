<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderChartController extends Controller
{
      public function show()
    {
        $orders = Order::all();

        $months = [
            'January','February','March','April',
            'May','June','July','August',
            'September','October','November','December'
        ];
        $totals = [];
        for ($i = 1; $i <= 12; $i++) {
            $count = Order::whereMonth('created_at', $i)->count();
            $totals[] = $count;
        }
        return view('admin.orderchart', compact('orders','months', 'totals'));
    }
}
