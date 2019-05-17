<?php

namespace App\Http\Controllers;

use App\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(1);
        return view('frontend.products.index', compact('categories'));
    }
}
