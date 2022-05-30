<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SystemHeader\StoreSystemHeaderRequest;
use App\Http\Requests\Admin\SystemHeader\UpdateSystemHeaderRequest;
use App\Http\Requests\Admin\SystemText\StoreSystemTextRequest;
use App\Http\Requests\Admin\SystemText\UpdateSystemTextRequest;
use App\Models\System;
use App\Models\SystemHeader;
use App\Models\SystemText;
use Illuminate\Http\Request;

class SystemTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemTexts = SystemText::latest()->paginate(10);
        return view('admin.system_text.index', compact('systemTexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.system_text.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemTextRequest $request)
    {
         SystemText::create($request->all());
        return redirect()->route('system_texts.index');
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
    public function show(SystemText  $systemText)
    {
        return  view('admin.system_text.show' , compact('systemText'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemText  $systemText)
    {
        return  view('admin.system_text.edit' , compact('systemText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemTextRequest $request, SystemText  $systemText)
    {


        $systemText->update([
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
        ]);

        return redirect()->route('system_texts.index');
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
    public function destroy(SystemText  $systemText)
    {
        $systemText->delete();
        return  redirect()->route('system_texts.index');
    }
}
