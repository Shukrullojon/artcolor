<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;

class DownloadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DownloadCategory::latest()->paginate(20);
        return view('admin.download-category.index',[
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.download-category.create');
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
        DownloadCategory::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'image' => $image,
        ]);
        return redirect()->route('downloadcategory.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DownloadCategory::where('id',$id)->first();
        return view('admin.download-category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DownloadCategory::where('id',$id)->first();
        return view('admin.download-category.edit', compact('category'));
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
        $category = DownloadCategory::where('id',$id)->first();
        $image = $category->image;
        if(isset($request->image)){
            $this->deleteImage($category->image);
            $image = $this->uploadImage($request);
        }
        $category->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'image' => $image,
        ]);
        return redirect()->route('downloadcategory.index')->with("success","Update successful!");
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
        $category = DownloadCategory::where('id',$id)->first();
        $this->deleteImage($category->image);
        $category->delete();
        return redirect()->route('downloadcategory.index')->with('success',"Delete successful!");
    }
}
