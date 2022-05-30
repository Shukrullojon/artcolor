<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryFilter;
use App\Models\GalleryVideo;
use App\Models\GalleryVideoFilter;
use Illuminate\Http\Request;

class GalleryVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = GalleryVideo::latest()->paginate(20);
        return view('admin.gallery-video.index',[
            'videos' => $videos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filters = GalleryVideoFilter::get();
        return view('admin.gallery-video.create',[
            'filters' => $filters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        GalleryVideo::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'image' => $image,
            'link' => $request->link,
            'filter_id' => $request->filter_id,
        ]);
        return redirect()->route('galleryvideo.index')->with("success","Saved successful!");
    }

    public function uploadImage($request){
        $name =  rand(1000,9999).time()."." . $request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads/'), $name);
        return $name;
    }

    public function deleteImage($data){
        if(file_exists(public_path('uploads/'.$data))){
            unlink(public_path('uploads/'.$data));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = GalleryVideo::where('id',$id)->first();
        return view('admin.gallery-video.show',[
            'video'=>$video,
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
        $video = GalleryVideo::where('id',$id)->first();
        $filters = GalleryVideoFilter::get();
        return view('admin.gallery-video.edit',[
            'video'=>$video,
            'filters' => $filters,
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
        $video = GalleryVideo::where('id',$id)->first();
        $image = $video->image;
        if(isset($request->image)){
            $this->deleteImage($video->image);
            $image = $this->uploadImage($request);
        }
        $video->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'image' => $image,
            'link' => $request->link,
            'filter_id' => $request->filter_id,
        ]);
        return redirect()->route('galleryvideo.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = GalleryVideo::where('id',$id)->first();
        $this->deleteImage($video->image);
        $video->delete();
        return redirect()->route('galleryvideo.index')->with('success',"Delete successful!");
    }
}
