<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use URL;

class PromotionsController extends Controller
{
    public function edit()
    {
        $global_settings = DB::table('global_settings')->whereId(1)->first();

        return view('backend.promotions.edit', compact('global_settings'));
    }

    public function update(Request $request)
    {
        $url = '';

        if (!empty($request->file('image'))) {
            // Automatically generate a unique ID for file
            $path = Storage::putFile('public', new File($request->file('image')));
            $url = URL::to('/') . '' . Storage::url($path);
            $request['promotion_header_url'] = $url;
        }

        DB::table('global_settings')->where('id', 1)
            ->update($request->except('_token', '_method', 'image'));

        Session::flash('message', "Nieuwsbericht is gewijzigd.");

        return redirect()->route('dashboard.promotions.edit');
    }
}
