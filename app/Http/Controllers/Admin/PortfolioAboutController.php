<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioAbout;
use Illuminate\Http\Request;

class PortfolioAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = PortfolioAbout::latest()->paginate(20);
        return view('admin.portfolio-about.index',[
            'abouts' => $abouts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio-about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PortfolioAbout::create([
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'social_uz' => $request->social_uz,
            'social_ru' => $request->social_ru,
            'social_en' => $request->social_en,
            'link' => $request->link,
        ]);
        return redirect()->route('portfolioabout.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = PortfolioAbout::where('id',$id)->first();
        return view('admin.portfolio-about.show',[
            'about' => $about,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = PortfolioAbout::where('id',$id)->first();
        return view('admin.portfolio-about.edit',[
            'about' => $about,
        ]);
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
        $about = PortfolioAbout::where('id',$id)->first();
        $about->update([
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'social_uz' => $request->social_uz,
            'social_ru' => $request->social_ru,
            'social_en' => $request->social_en,
            'link' => $request->link,
        ]);
        return redirect()->route('portfolioabout.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = PortfolioAbout::where('id',$id)->first();
        $about->delete();
        return redirect()->route('portfolioabout.index')->with('success',"Delete successful!");
    }
}
