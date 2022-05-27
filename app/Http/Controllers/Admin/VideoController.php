<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Videos\StoreVideoRequest;
use App\Http\Requests\Admin\Videos\UpdateVideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->paginate(10);
        return  view('admin.videos.index' ,compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreVideoRequest $request)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);

        }
        Video::create(
            [
                'link' => $request->link ,
                'image' => $image
            ]
        );
        return redirect()->route('videos.index')->with("success","Saved successful!");
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
    public function show(Video $video)
    {
        return view('admin.videos.show' , compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit' , compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($video->image);
        }else{
            $image = $video->image ;
        }
        $video->update(
            [
                'link' => $request->link ,
                'image' => $image
            ]
        );
        return redirect()->route('videos.index')->with("success","Saved successful!");
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
    public function destroy(Video $video)
    {
        $this->deleteImage($video->image);
        $video->delete();
        return redirect()->route('videos.index')->with("success","Deleted successful!");
    }
}
