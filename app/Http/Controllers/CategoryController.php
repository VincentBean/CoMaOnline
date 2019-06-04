<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use URL;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('frontend.category.index', compact('categories'));
    }

    public function category(Category $category)
    {
        //This is where we use a 'slug' this way we can essentialy create an nice looking URL
        //Instead of an id based URL, as the slug queries our database we can get our category
        //And since we link our models we can even take it further and reach directly into our products model.

        return view('frontend.category.details', compact('category'));
    }

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);

        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $url = '';

        $rules = $request->validate([
            'header_image' => 'mimes:png,jpg,jpeg|max:10000',
            'category_image' => 'mimes:png,jpg,jpeg|max:10000',
        ]);

        if (!empty($request->file('header_image'))) {
            // Automatically generate a unique ID for file
            $path = Storage::putFile('public', new File($request->file('header_image')));
            $url = URL::to('/') . '' . Storage::url($path);
            $request['header_image_url'] = $url;
        }

        if (!empty($request->file('category_image'))) {
            // Automatically generate a unique ID for file
            $path = Storage::putFile('public', new File($request->file('category_image')));
            $url = URL::to('/') . '' . Storage::url($path);
            $request['category_image_url'] = $url;
        }

        Category::where('id', $id)
            ->update($request->except('_token', '_method', 'header_image', 'category_image'));

        Session::flash('message', "Nieuwsbericht is gewijzigd.");
        Session::flash('new-id', $id);

        return redirect()->route('dashboard.categories');
    }
}
