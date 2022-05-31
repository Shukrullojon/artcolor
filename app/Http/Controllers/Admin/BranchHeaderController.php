<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BranchHeader;
use Illuminate\Http\Request;

class BranchHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = BranchHeader::latest()->paginate(20);
        return view('admin.branch-header.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch-header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BranchHeader::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'button_uz' => $request->button_uz,
            'button_ru' => $request->button_ru,
            'button_en' => $request->button_en,
            'button_url' => $request->button_url,
        ]);
        return redirect()->route('branchheader.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = BranchHeader::where('id',$id)->first();
        return view('admin.branch-header.show' , compact('header'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = BranchHeader::where('id',$id)->first();
        return view('admin.branch-header.edit' , compact('header'));
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
        $header = BranchHeader::where('id',$id)->first();
        $header->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'button_uz' => $request->button_uz,
            'button_ru' => $request->button_ru,
            'button_en' => $request->button_en,
            'button_url' => $request->button_url,
        ]);
        return redirect()->route('branchheader.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BranchHeader::where('id',$id)->delete();
        return redirect()->route('branchheader.index')->with('success',"Delete successful!");
    }
}
