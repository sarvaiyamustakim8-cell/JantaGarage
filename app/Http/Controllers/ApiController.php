<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    //
    public function getPosts()
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/ditto');
        if ($response->successful()) {
            return response()->json($response->json());
        }
        return response()->json([
            'error' => 'API request failed'
        ], 500);
    }
}
