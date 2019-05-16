<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $xml = getData('products');

        $save = simplexml_load_string($xml);

      

        Storage::disk('local')->put('xml_data/products.xml', $save);

        // $xml_file = Storage::disk('local')->get('xml_data/products.xml', $xml);

        // return response($xml_file)->header('Content-Type', 'text/xml');
        

        // $xml = XmlParser::load('path/to/above.xml');
        // return view('home');
    }
}
