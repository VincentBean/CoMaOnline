<?php

namespace App\Http\Controllers;

use App\Article;
use App\Promotion;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $promotions = Promotion::all()->random(3);

        $article = Article::orderBy('created_at', 'desc')->first();
        $global_settings = DB::table('global_settings')->whereId(1)->first();

        return view('welcome', compact('promotions', 'article', 'global_settings'));
    }
}
