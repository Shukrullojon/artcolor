<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryFilter;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GalleryItem::latest()->paginate(20);
        return view('admin.gallery-item.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filters = GalleryFilter::where('parent_id','!=',0)->get();
        return view('admin.gallery-item.create',[
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
        GalleryItem::create([
            'filter_id' => $request->filter_id,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'image' => $image,
        ]);
        return redirect()->route('galleryitem.index')->with("success","Saved successful!");
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
        $item = GalleryItem::where('id',$id)->first();
        return view('admin.gallery-item.show',[
            'item' => $item,
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
        $item = GalleryItem::where('id',$id)->first();
        $filters = GalleryFilter::where('parent_id','!=',0)->get();
        return view('admin.gallery-item.edit',[
            'item' => $item,
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
        $item = GalleryItem::where('id',$id)->first();
        $image = $item->image;
        if(isset($request->image)){
            $this->deleteImage($item->image);
            $image = $this->uploadImage($request);
        }
        $item->update([
            'filter_id' => $request->filter_id,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'image' => $image,
        ]);
        return redirect()->route('galleryitem.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = GalleryItem::where('id',$id)->first();
        $this->deleteImage($item->image);
        $item->delete();
        return redirect()->route('galleryitem.index')->with('success',"Delete successful!");
    }
}
