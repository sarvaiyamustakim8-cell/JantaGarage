<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;



class SubscriptionController extends Controller
{
    public function index()
    {
        $subscription = Subscription::where('user_id', Auth::id())
            ->latest()
            ->first();

        return view('purchasePlan', compact('subscription'));
    }
    public function store(Request $request)
    {
        $plan = $request->plan;

        if ($plan == 'membership6') {

            $name = '2 Wheeler Membership (6 Months)';
            $price = 5999;
            $months = 6;
        } elseif ($plan == 'membership12') {

            $name = '2 Wheeler Membership (12 Months)';
            $price = 7999;
            $months = 12;
        } elseif ($plan == 'popular') {

            $name = 'Popular Membership (12 Months)';
            $price = 10999;
            $months = 12;
        } else {
            return back()->with('error', 'Invalid Plan');
        }

        Subscription::create([
            'user_id' => auth()->id(),
            'plan_name' => $name,
            'price' => $price,
            'start_date' => now(),
            'end_date' => now()->addMonths($months),
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'Membership Purchased Successfully');
    }
}
