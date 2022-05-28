<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAbout;
use Illuminate\Http\Request;

class GalleryAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = GalleryAbout::latest()->paginate(20);
        return view('admin.gallery-about.index',[
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
        return view('admin.gallery-about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GalleryAbout::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
        ]);
        return redirect()->route('galleryabout.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = GalleryAbout::where('id',$id)->first();
        return view('admin.gallery-about.show',[
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
        $about = GalleryAbout::where('id',$id)->first();
        return view('admin.gallery-about.edit',[
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
        $about = GalleryAbout::where('id',$id)->first();
        $about->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
        ]);
        return redirect()->route('galleryabout.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = GalleryAbout::where('id',$id)->first();
        $about->delete();
        return redirect()->route('galleryabout.index')->with('success',"Delete successful!");
    }
}
