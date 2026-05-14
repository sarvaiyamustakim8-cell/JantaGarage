<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    //
    function index(Request $request)
    {
        return view('/price');
    }
}
