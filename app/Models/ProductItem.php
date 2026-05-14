<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    //
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'qty',
        'total'
    ];
    public function service()
    {
        return $this->belongsTo(Product::class);
    }
}
