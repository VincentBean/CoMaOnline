<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::all();
        $users = User::orderBy('id', 'DESC')->get();
        $orders = Order::sum('price');	
        
        return view('backend.dashboard.index', compact('articles', 'users', 'orders'));
    }

    public function newsArticles()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(10);

        return view('backend.articles.index', compact('articles'));
    }

    public function categories()
    {
        $categories = Category::paginate(10);

        return view('backend.categories.index', compact('categories'));
    }

    public function users()
    {
        $users = User::paginate(10);

        return view('backend.users.index', compact('users'));
    }
}
