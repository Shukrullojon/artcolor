<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategoryHeader;
use Illuminate\Http\Request;

class SubCategoryHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = SubCategoryHeader::latest()->paginate(20);
        return view('admin.sub-category-header.index',[
            'subs' => $subs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sub-category-header.create');
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
        SubCategoryHeader::create([
            'title_uz'=>$request->title_uz,
            'title_ru'=>$request->title_ru,
            'title_en'=>$request->title_en,
            'info_uz'=>$request->info_uz,
            'info_ru'=>$request->info_ru,
            'info_en'=>$request->info_en,
            'image' => $image,
        ]);
        return redirect()->route('subcategoryheader.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub = SubCategoryHeader::where('id',$id)->first();
        return view('admin.sub-category-header.show', compact('sub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = SubCategoryHeader::where('id',$id)->first();
        return view('admin.sub-category-header.edit',compact('sub'));
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
        $sub = SubCategoryHeader::where('id',$id)->first();
        $image = $sub->image;
        if(isset($request->image)){
            $this->deleteImage($sub->image);
            $image = $this->uploadImage($request);
        }
        $sub->update([
            'title_uz'=>$request->title_uz,
            'title_ru'=>$request->title_ru,
            'title_en'=>$request->title_en,
            'info_uz'=>$request->info_uz,
            'info_ru'=>$request->info_ru,
            'info_en'=>$request->info_en,
            'image' => $image,
        ]);
        return redirect()->route('subcategoryheader.index')->with("success","Update successful!");
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = SubCategoryHeader::where('id',$id)->first();
        $this->deleteImage($sub->image);
        $sub->delete();
        return redirect()->route('subcategoryheader.index')->with('success',"Delete successful!");
    }
}
