<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Order;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\ProductItem;

class InvoicesController extends Controller
{
    //
    function index(Request $request)
    {
        $productItems = ProductItem::all();
        return view('admin.invoices', compact('productItems'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'date' => 'required',
            'contact' => 'required',
            'amount' => 'required',
        ]);

        // ✅ FIXED: use items not amounts
        $services = [];

        if ($request->items) {
            foreach ($request->items as $item) {

                $services[] = [
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'amount' => $item['amount']
                ];
            }
        }

        Invoice::create([
            'name' => $request->name,
            'email' => $request->email,

            'services' => json_encode($services),

            'amount' => $request->amount,
            'status' => $request->status,
            'date' => $request->date,
            'contact' => $request->contact,
        ]);

        return redirect()->back()->with('success', 'Invoice Created Successfully!');
    }
    function list(Request $request)
    {
        $search = $request->search;

        $invoices = Invoice::when($search, function ($query) use ($search) {

            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->latest()->paginate(4);
        return view('admin.list', compact('invoices'));
    }
    function destory($id)
    {
        $invoices = Invoice::findOrFail($id);
        $invoices->delete();
        return back()->with('success', 'Deleted successfully');
    }
    function show($id)
    {
        $invoice = Invoice::findOrFail($id);


        return view('admin.view', compact('invoice'));
    }
}
