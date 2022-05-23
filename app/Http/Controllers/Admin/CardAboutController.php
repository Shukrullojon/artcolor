<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CardAbout\StoreCardAboutRequest;
use App\Models\CardAbout;
use Illuminate\Http\Request;

class CardAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardAbouts = CardAbout::latest()->paginate(20);
        return view('admin.card_about.index', compact('cardAbouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.card_about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardAboutRequest $request)
    {
        CardAbout::create($request->all());
        return redirect()->route('card_abouts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CardAbout $cardAbout)
    {
        return view('admin.card_about.show' , compact('cardAbout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CardAbout $cardAbout)
    {
        return view('admin.card_about.edit' , compact('cardAbout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardAbout $cardAbout)
    {
        $cardAbout->update($request->all());
        return redirect()->route('card_abouts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardAbout $cardAbout)
    {
        $cardAbout->delete();
        return redirect()->route('card_abouts.index');
    }
}
