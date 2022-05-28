<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryHeader;
use Illuminate\Http\Request;

class GalleryHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = GalleryHeader::latest()->paginate(20);
        return view('admin.gallery-header.index',[
            'headers' => $headers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery-header.create');
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
        GalleryHeader::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'image' => $image,
        ]);
        return redirect()->route('galleryheader.index')->with("success","Saved successful!");
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
        $header = GalleryHeader::where('id',$id)->first();
        return view('admin.gallery-header.show',[
            'header' => $header,
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
        $header = GalleryHeader::where('id',$id)->first();
        return view('admin.gallery-header.edit',[
            'header' => $header,
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
        $header = GalleryHeader::where('id',$id)->first();
        $image = $header->image;
        if(isset($request->image)){
            $this->deleteImage($header->image);
            $image = $this->uploadImage($request);
        }
        $header->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'image' => $image,
        ]);
        return redirect()->route('galleryheader.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $header = GalleryHeader::where('id',$id)->first();
        $this->deleteImage($header->image);
        $header->delete();
        return redirect()->route('galleryheader.index')->with('success',"Delete successful!");
    }
}
