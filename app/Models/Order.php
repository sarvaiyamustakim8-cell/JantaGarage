<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  //
  protected $fillable = [
    'user_id',
    'name',
    'email',
    'contact',
    'date',
    'service',
    'status',
    'payment_method',
    'payment_status',
    'payment_id',
    'amount'
];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
