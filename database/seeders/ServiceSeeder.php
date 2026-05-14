<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'customer_name' => 'Rahul',
            'vehicle_number' => 'GJ01AB1234',
            'service_type' => 'Oil Change',
            'status' => 'Pending',
            'price' => 500
        ]);

        Service::create([
            'customer_name' => 'Amit',
            'vehicle_number' => 'GJ02XY5678',
            'service_type' => 'Brake Repair',
            'status' => 'In Progress',
            'price' => 1200
        ]);
    }
}