<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    function index(Request $request)
    {
        return view('/about');
    }
}
