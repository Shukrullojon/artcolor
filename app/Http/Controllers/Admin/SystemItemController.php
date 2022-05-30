<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SystemItem\StoreSystemItemRequest;
use App\Http\Requests\Admin\SystemItem\UpdateSystemItemRequest;
use App\Models\System;
use App\Models\SystemItem;
use Illuminate\Http\Request;

class SystemItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemItems = SystemItem::latest()->paginate(10);
        return view('admin.system_item.index', compact('systemItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems = System::all();
        return  view('admin.system_item.create' , compact('systems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemItemRequest $request)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        SystemItem::create([
            'image' => $image ,
            'system_id' => $request->system_id ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('system_items.index');
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
    public function show(SystemItem $systemItem)
    {
        return  view('admin.system_item.show' , compact('systemItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemItem $systemItem)
    {
        $systems = System::all();
        return  view('admin.system_item.edit' , compact(['systems' , 'systemItem']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemItemRequest $request, SystemItem $systemItem)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($systemItem->image);
        }else{
            $image = $systemItem->image;
        }
        $systemItem->update([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'system_id' => $request->system_id ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,

        ]);

        return redirect()->route('system_items.index');
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
    public function destroy( SystemItem $systemItem)
    {
        $systemItem->delete();
        $this->deleteImage($systemItem->image);
        return  redirect()->route('system_items.index');
    }
}
