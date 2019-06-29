<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function Subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => [ 'required', 'email' ]
        ]);
        $subscriber = Newsletter::create([
            'email' => $request->get('email')
        ]);
        $subscriber->save();

        return redirect()->back()->with('message', 'U bent succesvol ingeschreven voor de nieuwsbrief');
    }

    public function delete(Request $request)
    {
        $subscribers = $request->subscribers;
        if (!empty($subscribers)) {
            foreach ($subscribers as $subscriber) {
                $subscriber = Newsletter::find($subscriber)->delete();
            }
        }
        return redirect()->route('dashboard.newsletter');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
