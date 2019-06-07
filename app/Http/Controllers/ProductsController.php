<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('frontend.products.index', compact('categories'));
    }

    public function details($id)
    {
        //Retrieves all the data from the model on the product
        $product = Product::find($id);
        $getSubProducts = SubCategory::find($product->sub_category_id);

        //Filters out the current product and returns all the products with the same sub_category
        $subProducts = Product::where('sub_category_id', $getSubProducts->id)
            ->where('id', '!=', $id)
            ->get();

        return view('frontend.products.details', compact('product', 'subProducts'));
    }

    public function category(Category $category)
    {
        //This is where we use a 'slug' this way we can essentialy create an nice looking URL
        //Instead of an id based URL, as the slug queries our database we can get our category
        //And since we link our models we can even take it further and reach directly into our products model.

        $categories = Category::all();

        $subCategories = SubCategory::whereCategoryId($category->id)->get();

        return view('frontend.category.index', compact('category', 'categories', 'subCategories'));
    }

    public function subCategory($category, $id)
    {

        $category = Category::whereSlug($category)->first();
        $categories = Category::all();

        $subCategories = SubCategory::whereCategoryId($category->id)->get();
        $subCategory = SubCategory::whereId($id)->first();

        return view('frontend.category.subcategories', compact('category', 'categories', 'subCategories', 'subCategory'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $products = Product::where("Title", "like", "%$query%")->get();

        $amount = Product::where("Title", "like", "%$query%")->count();

        return view('frontend.products.search', compact('products', 'amount'));
    }
}
