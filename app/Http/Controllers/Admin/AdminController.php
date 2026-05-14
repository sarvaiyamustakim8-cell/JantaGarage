<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductItem;


class AdminController extends Controller
{
    //
    function index(Request $request)
    {
        $users = User::count();
        $orders= Order::count();
        $ProductItems =ProductItem::count();

        return view('admin.index', compact('users', 'orders','ProductItems'));
    }
}
