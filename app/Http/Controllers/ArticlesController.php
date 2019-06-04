<?php

namespace App\Http\Controllers;

use App\Article;
use Auth;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Session;
use URL;

class ArticlesController extends Controller
{
    public function create()
    {
        return view('backend.articles.create');
    }

    public function store(Request $request)
    {
        $rules = $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:10000',
            'title' => 'required|unique:articles',
            'sub_title' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $url = '';

        if (!empty($request->file('image'))) {
            // Automatically generate a unique ID for file
            $path = Storage::putFile('public', new File($request->file('image')));
            $url = URL::to('/') . '' . Storage::url($path);
            $request['header_img_url'] = $url;
        }

        $request['slug'] = Str::slug($request->title, '-');
        $request['user_id'] = Auth::user()->id;

        $article = Article::create($request->except('_token', '_method', 'image'));

        Session::flash('message', "Nieuwsbericht is aangemaakt.");
        Session::flash('new-id', $article->id);

        return redirect()->route('dashboard.articles');
    }

    public function edit(Request $request, $id)
    {
        $article = Article::find($id);

        return view('backend.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $url = '';

        if (!empty($request->file('image'))) {
            // Automatically generate a unique ID for file
            $path = Storage::putFile('public', new File($request->file('image')));
            $url = URL::to('/') . '' . Storage::url($path);
            $request['header_img_url'] = $url;
        }

        $request['slug'] = Str::slug($request->title, '-');
        $request['user_id'] = Auth::user()->id;

        Article::where('id', $id)
            ->update($request->except('_token', '_method', 'image'));

        Session::flash('message', "Nieuwsbericht is gewijzigd.");
        Session::flash('new-id', $id);

        return redirect()->route('dashboard.articles');
    }

    public function delete(Request $request)
    {
        $articles = $request->articles;
        if (!empty($articles)) {
            foreach ($articles as $article) {
                $article = Article::find($article)->delete();
            }
        }

        return redirect()->route('dashboard.articles');
    }

    public function details(Article $article)
    {
        return view('frontend.articles.index', compact('article'));
        return $article;
    }

    public function load_data(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $data = Article::where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(1)
                    ->get();
            } else {
                $data = Article::orderBy('id', 'DESC')
                    ->limit(1)
                    ->get();
            }
            $output = '';
            $last_id = '';

            if (!$data->isEmpty()) {
                foreach ($data as $article) {
                    $output .= '
                    <div class="column">
                        <!-- Post-->
                        <div class="post-module">
                            <!-- Thumbnail-->
                            <div class="thumbnail">
                                <div class="date">
                                    <div class="day">' . $article->dateNumber() . '</div>
                                    <div class="month">' . $article->dateMonth() . '</div>
                                </div>
                                <img class="img-fluid header-image"
                                    src="' . $article->header_img_url . '" />
                            </div>
                            <!-- Post Content-->
                            <div class="post-content">
                                <div class="category">' . $article->category . '</div>
                                <h1 class="title">' . $article->title . '</h1>
                                <h2 class="sub_title">' . $article->sub_title . '</h2>
                                ' . $article->shortDescription() . '
                                <div class="post-meta">
                                    <span class="timestamp">
                                        <i class="fa fa-calendar-alt"></i>
                                        <a href="">' . $article->created_at->diffForHumans() . '</a>
                                    </span>
                                    <span class="comment">
                                        <i class="fas fa-user-tie"></i>
                                        <a href="">' . ($article->user != null ? '' . $article->user->customer->name . " " . $article->user->customer->surname . '' : 'Administrator') . '</a>
                                    </span>
                                    <span class="float-right">
                                    <a href="' . route('home.article.details', ['slug' => $article->slug]) . '">Lees meer</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>';
                    $last_id = $article->id;
                }
                $output .= '
                <div id="load_more" class="text-center mt-2">
                    <button type="button" name="load_more_button" class="text-center btn btn-primary" data-id="' . $last_id . '" id="load_more_button">Laad meer artikelen</button>
                </div>';
            } else {
                $output .= '
                <div id="load_more" class="text-center mt-2">
                    <p class="font-weight-bold">Alle artikelen geladen</p>
                </div>';
            }
            echo $output;
        }
    }
}
