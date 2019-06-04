<?php

namespace App\Http\Controllers;

use App\DeliverySlot;
use App\TimeSlot;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //validate if user has products in his cart
        if (Cart::content()->count() > 0) {

            $timeSlots = TimeSlot::all();
            $deliverySlots = DeliverySlot::orderBy('date', 'ASC')->take(7)->get();

            return view('frontend.orders.delivery', compact('deliverySlots', 'timeSlots'));
        }

        return redirect()->route('home.cart');

    }

    public function deliveryMoment(Request $request)
    {
        //validate if user has products in his cart
        if (Cart::content()->count() > 0) {
            $rules = $request->validate([
                'time_slot_id' => 'required|exists:time_slots,id',
            ]);
            Session::put('time_slot_id', $request->time_slot_id);
            return redirect()->route('home.order.confirm');
        }

        return redirect()->back()->with('error', 'Er is een probleem opgetreden.');
    }

    public function confirm()
    {
        return Cart::content();

        if(Cart::content()->count() > 0)
        {
            //Get logged in user
            $user = Auth::user();
    
            $timeSlotId = Session::get('time_slot_id');
            $timeSlot = TimeSlot::findOrFail($timeSlotId);
    
            return view('frontend.orders.confirm', compact('user', 'timeSlot'));
        }
        return redirect()->route('home.cart');
    }
}
