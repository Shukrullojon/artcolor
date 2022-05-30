<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadItemFilter;
use Illuminate\Http\Request;

class DownloadItemFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = DownloadItemFilter::latest()->paginate(20);
        return view('admin.download-item-filter.index',[
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
        return view('admin.download-item-filter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DownloadItemFilter::create([
            'type' => $request->type,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
        ]);
        return redirect()->route('downloaditemfilter.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filter = DownloadItemFilter::where('id',$id)->first();
        return view('admin.download-item-filter.show',[
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
        $filter = DownloadItemFilter::where('id',$id)->first();
        return view('admin.download-item-filter.edit',[
            'filter' => $filter,
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
        $filter = DownloadItemFilter::where('id',$id)->first();
        $filter->update([
            'type' => $request->type,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
        ]);
        return redirect()->route('downloaditemfilter.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filter = DownloadItemFilter::where('id',$id)->delete();
        return redirect()->route('downloaditemfilter.index')->with('success',"Delete successful!");
    }
}
