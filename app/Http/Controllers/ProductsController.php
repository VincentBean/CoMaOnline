<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('frontend.products.index', compact('categories'));

        // $categories = Category::paginate(1);
        // return view('frontend.products.index', compact('categories'));
    }

    public function details($id)
    {
        $product = Product::find($id);

        return view('frontend.products.details', compact('product'));
    }

    public function category(Category $category)
    {
        //This is where we use a 'slug' this way we can essentialy create an nice looking URL
        //Instead of an id based URL, as the slug queries our database we can get our category
        //And since we link our models we can even take it further and reach directly into our products model.

        $categories = Category::all();

        return view('frontend.category.index', compact('category', 'categories'));
    }
}
