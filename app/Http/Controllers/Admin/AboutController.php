<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\StoreAboutRequest;
use App\Http\Requests\Admin\About\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->paginate(20);
        return view('admin.about.index' ,[
           'abouts' => $abouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request )
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        if(isset($request->video_image)){
            $video_image = $this->uploadVideoImage($request);
        }

        About::create([
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'title_short_uz' => $request->short_title_uz ,
            'title_short_ru' => $request->short_title_ru ,
            'title_short_en' => $request->short_title_en ,
            'text_uz' => $request->text_uz ,
            'text_ru' => $request->text_ru ,
            'text_en' => $request->text_en ,
            'text_right_uz' => $request->right_text_uz ,
            'text_right_ru' => $request->right_text_ru ,
            'text_right_en' => $request->right_text_en ,
            'image' => $image ,
            'video_image' => $video_image ,
            'video_link' => $request->video_link
        ]);
        return redirect()->route('about.index')->with('success' ,"Saved successful!") ;
    }

    public function uploadImage($request){
        $name =  rand(1000,9999).time()."." . $request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads/'), $name);
        return $name;
    }
    public function uploadVideoImage($request){
        $name =  rand(1000,9999).time()."." . $request->file('video_image')->getClientOriginalExtension();
        $request->video_image->move(public_path('uploads/'), $name);
        return $name;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        return  view('admin.about.show' , compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
           return view('admin.about.edit' , compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about)
    {

        $image = '';
        $video_image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }else{
            $image = $about->image;
        }
        if(isset($request->video_image)){
            $video_image = $this->uploadVideoImage($request);
        }else{
            $video_image = $about->video_image;
        }

        $about->update([
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'title_short_uz' => $request->short_title_uz ,
            'title_short_ru' => $request->short_title_ru ,
            'title_short_en' => $request->short_title_en ,
            'text_uz' => $request->text_uz ,
            'text_ru' => $request->text_ru ,
            'text_en' => $request->text_en ,
            'text_right_uz' => $request->right_text_uz ,
            'text_right_ru' => $request->right_text_ru ,
            'text_right_en' => $request->right_text_en ,
            'image' => $image ,
            'video_image' => $video_image ,
            'video_link' => $request->video_link
        ]);
        return redirect()->route('about.index')->with('success' ,"Saved successful!") ;
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
    public function destroy(About $about)
    {
        $this->deleteImage($about->image);
        $about->delete();
        return redirect()->route('about.index')->with('success',"Delete successful!");
    }
}
