<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\System\StoreSystemRequest;
use App\Http\Requests\Admin\System\UpdateSystemRequest;
use App\Http\Requests\Admin\SystemItemHeader\StoreSystemItemHeaderRequest;
use App\Http\Requests\Admin\SystemItemHeader\UpdateSystemItemHeaderRequest;
use App\Models\System;
use App\Models\SystemItemHeader;
use Illuminate\Http\Request;

class SystemItemHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemItemHeaders = SystemItemHeader::latest()->paginate(10);
        return view('admin.system_item_header.index', compact('systemItemHeaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.system_item_header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemItemHeaderRequest $request)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        SystemItemHeader::create([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('system_item_headers.index');
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
    public function show(SystemItemHeader $systemItemHeader)
    {
        return  view('admin.system_item_header.show' , compact('systemItemHeader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemItemHeader $systemItemHeader)
    {
        return  view('admin.system_item_header.edit' , compact('systemItemHeader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemItemHeaderRequest $request, SystemItemHeader $systemItemHeader)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($systemItemHeader->image);
        }else{
            $image = $systemItemHeader->image;
        }
        $systemItemHeader->update([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,

        ]);

        return redirect()->route('system_item_headers.index');
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
    public function destroy(SystemItemHeader $systemItemHeader)
    {
        $systemItemHeader->delete();
        $this->deleteImage($systemItemHeader->image);
        return  redirect()->route('system_item_headers.index');
    }
}
