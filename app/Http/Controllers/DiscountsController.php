<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Promotion;

class DiscountsController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        $categories = Category::all();

        return view('frontend.discount.index', compact('promotions', 'categories'));
    }
}
