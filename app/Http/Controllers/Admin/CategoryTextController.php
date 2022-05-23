<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryText;
use Illuminate\Http\Request;

class CategoryTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryText = CategoryText::latest()->paginate(20);
        return view('admin.category-text.index',[
            'categoryText' => $categoryText,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-text.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryText = new CategoryText();
        $categoryText::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
        ]);
        return redirect()->route('categorytext.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryText = CategoryText::where('id',$id)->first();
        return view('admin.category-text.show',compact('categoryText'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryText = CategoryText::where('id',$id)->first();
        return view('admin.category-text.edit',compact('categoryText'));
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
        $categoryText = CategoryText::where('id',$id)->first();
        $categoryText->update([
            'title_uz'=>$request->title_uz,
            'title_ru'=>$request->title_ru,
            'title_en'=>$request->title_en,
            'info_uz'=>$request->info_uz,
            'info_ru'=>$request->info_ru,
            'info_en'=>$request->info_en,
        ]);
        return redirect()->route('categorytext.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryText = CategoryText::where('id',$id)->first();
        $categoryText->delete();
        return redirect()->route('categorytext.index')->with('success',"Delete successful!");
    }
}
