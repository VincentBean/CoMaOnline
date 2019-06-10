<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\UpdateCustomer;
use App\Order;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customer = Auth::user()->customer;

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->take(5)->get();

        return view('frontend.profile.index', compact('customer', 'orders'));
    }

    public function getAccount()
    {
        $user = Auth::user();

        return view('frontend.profile.account', compact('user'));
    }

    public function getOrders()
    {
        $customer = Auth::user()->customer;

        $orders = Order::where('user_id', $customer->user_id)->orderBy('id', 'DESC')->paginate(10);

        return view('frontend.profile.orders', compact('orders'));
    }

    public function getOrder($id)
    {
        $customer = Auth::user()->customer;

        $order = Order::whereId($id)
            ->where('user_id', $customer->user_id)->firstOrFail();

        return view('frontend.profile.order', compact('order'));
    }

    public function updateAccount(UpdateCustomer $request)
    {
        $user = Auth::user();
        $user_account = User::findOrFail($user->id);
        $user_account->email = $request->email;

        $user_account->save();

        Customer::where('user_id', $user->id)
            ->update($request->except('_token', '_method', 'email', 'disabled'));

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", __('passwords.password'));
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", __('passwords.new'));
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", __('passwords.success'));
    }
}
