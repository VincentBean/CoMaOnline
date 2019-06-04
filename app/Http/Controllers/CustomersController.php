<?php

namespace App\Http\Controllers;

use App\Customer;
use Auth;

class CustomersController extends Controller
{
    public function index()
    {
        $cId = Auth::user()->customer->id;

        return Customer::find($cId)->orders;

        return 'todo customer';
    }
}
