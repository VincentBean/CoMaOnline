<?php

namespace App\Http\Controllers;

use App\Customer;
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

            $deliverySlots = DeliverySlot::orderBy('id', 'DESC')->take(7)->get()->reverse();

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

            $timeSlot = TimeSlot::findOrFail($request->time_slot_id);
            if ($timeSlot->unavailable) {
                return redirect()->back()->with('error', 'Het geselecteerde bezorgmoment is al bezet.');
            }

            Session::put('time_slot_id', $request->time_slot_id);
            return redirect()->route('home.order.confirm');
        }

        return redirect()->back()->with('error', 'Er is een probleem opgetreden.');
    }

    public function confirm()
    {
        if (Cart::content()->count() > 0) {
            $user = Auth::user();
            $timeSlotId = Session::get('time_slot_id');
            $timeSlot = TimeSlot::findOrFail($timeSlotId);

            return view('frontend.orders.confirm', compact('user', 'timeSlot'));
        }
        return redirect()->route('home.cart');
    }

    public function confirmOrder(Request $request)
    {
        if (Cart::content()->count() > 0) {

            $user = Auth::user();

            $timeSlotId = Session::get('time_slot_id');
            $timeSlot = TimeSlot::findOrFail($timeSlotId);

            $order = Customer::findOrFail($user->customer->id)->orders()->create(['payment_type' => $request->payment_type,
                'price' => Cart::total() + $timeSlot->price]);

            foreach (Cart::content() as $product) {
                $order->products()->attach([$product->id => ['quantity' => $product->qty]]);
            }

            $timeSlot->unavailable = 1;
            $timeSlot->save();

            Cart::destroy();

            Session::flash('order_id', $order->id);

            return redirect()->route('home.order.finished');
        }
    }

    public function finished()
    {
        $orderId = Session::get('order_id');

        if ($orderId != null) {
            return view('frontend.orders.finished', compact('orderId'));
        }

        return redirect()->route('home.cart');
    }
}
