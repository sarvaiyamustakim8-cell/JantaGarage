<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function index(Request $request)
    {
        return view('admin.product');
    }
    function store(Request $request)
    {
        Product::create([
            'name' => $request->name
        ]);;
    }
}
