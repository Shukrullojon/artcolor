<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutAbout\StoreAboutAboutRequest;
use App\Http\Requests\Admin\AboutAbout\UpdateAboutAboutRequest;
use App\Http\Requests\Admin\System\StoreSystemRequest;
use App\Http\Requests\Admin\System\UpdateSystemRequest;
use App\Models\AboutAbout;
use App\Models\System;
use Illuminate\Http\Request;

class AboutAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutAbouts = AboutAbout::latest()->paginate(10);
        return view('admin.about_about.index', compact('aboutAbouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.about_about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutAboutRequest $request)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        AboutAbout::create([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
            'text_uz' => $request->text_uz ,
            'text_ru' => $request->text_ru ,
            'text_en' => $request->text_en ,
        ]);

        return redirect()->route('about_abouts.index');
    }
    public function uploadImage($request){
        $name =  rand(1000,9999).time()."." . $request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads/'), $name);
        return $name;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AboutAbout $aboutAbout)
    {
        return  view('admin.about_about.show' , compact('aboutAbout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutAbout $aboutAbout)
    {
        return  view('admin.about_about.edit' , compact('aboutAbout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutAboutRequest $request, AboutAbout $aboutAbout)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($aboutAbout->image);
        }else{
            $image = $aboutAbout->image;
        }
        $aboutAbout->update([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
            'text_uz' => $request->text_uz ,
            'text_ru' => $request->text_ru ,
            'text_en' => $request->text_en ,

        ]);

        return redirect()->route('about_abouts.index');
    }

    public function deleteImage($data){
        if(file_exists(public_path('uploads/'.$data))){
            unlink(public_path('uploads/'.$data));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutAbout $aboutAbout)
    {
        $aboutAbout->delete();
        $this->deleteImage($aboutAbout->image);
        return  redirect()->route('about_abouts.index');
    }
}
