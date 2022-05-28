<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryFilter;
use Illuminate\Http\Request;

class GalleryFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = GalleryFilter::latest()->paginate(20);
        return view('admin.gallery-filter.index',[
            'filters' => $filters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filters = GalleryFilter::where('parent_id',0)->get();
        return view('admin.gallery-filter.create',[
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
        GalleryFilter::create([
            'parent_id' => $request->parent_id,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
        ]);
        return redirect()->route('galleryfilter.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filter = GalleryFilter::where('id',$id)->first();
        return view('admin.gallery-filter.show',[
            'filter' => $filter,
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
        $filter = GalleryFilter::where('id',$id)->first();
        $filters = GalleryFilter::where('parent_id',0)->get();
        return view('admin.gallery-filter.edit',[
            'filter' => $filter,
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
        $filter = GalleryFilter::where('id',$id)->first();
        $filter->update([
            'parent_id' => $request->parent_id,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
        ]);
        return redirect()->route('galleryfilter.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filter = GalleryFilter::where('id',$id)->first();
        $filter->delete();
        return redirect()->route('galleryfilter.index')->with('success',"Delete successful!");
    }
}
