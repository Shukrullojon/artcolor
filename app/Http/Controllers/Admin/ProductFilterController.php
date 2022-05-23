<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductFilter;
use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = ProductFilter::latest()->paginate(20);
        return view('admin.product-filter.index',[
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
        $filters = ProductFilter::where('parent_id',0)->get();
        return view('admin.product-filter.create',[
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
        ProductFilter::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('productfilter.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filter = ProductFilter::where('id',$id)->first();
        return view('admin.product-filter.show',[
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
        $filter = ProductFilter::where('id',$id)->first();
        $filters = ProductFilter::where('parent_id',0)->get();
        return view('admin.product-filter.edit',[
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
        ProductFilter::where('id',$id)->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('productfilter.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filter = ProductFilter::where('id',$id)->delete();
        return redirect()->route('productfilter.index')->with('success',"Delete successful!");
    }
}
