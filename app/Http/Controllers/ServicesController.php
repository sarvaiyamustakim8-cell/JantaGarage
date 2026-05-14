<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\Service;

class ServicesController extends Controller
{
    //
    function index(Request $request)
    {
        return view('/services');
    }

    public function trackService($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'status' => false,
                'message' => 'Service not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => [
                'customer' => $service->customer_name,
                'vehicle' => $service->vehicle_number,
                'service' => $service->service_type,
                'status' => $service->status,
                'price' => $service->price,
            ]
        ]);
    }
}
