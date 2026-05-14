<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductItem;
use App\Models\Product;

class ProductItemController extends Controller
{
    //
    function index(Request $request)
    {
        $products = Product::with('items')->latest()->get();
        return view('admin.productItem', compact('products'));
    }
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name
        ]);

        if ($request->items) {
            foreach ($request->items as $item) {

                $total = $item['price'] * $item['qty'];

                ProductItem::create([
                    'product_id' => $product->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                    'total' => $total,
                ]);
            }
        }

        return back();
    }
}
