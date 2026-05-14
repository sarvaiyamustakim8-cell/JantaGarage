<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTracker extends Model
{
    //
     protected $fillable = [
        'user_id',
        'bike_name',
        'service_name',
        'status'
    ];
}
