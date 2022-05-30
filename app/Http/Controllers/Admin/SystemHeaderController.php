<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CardHeader\StoreCardHeaderRequest;
use App\Http\Requests\Admin\SystemHeader\StoreSystemHeaderRequest;
use App\Http\Requests\Admin\SystemHeader\UpdateSystemHeaderRequest;
use App\Models\CardHeader;
use App\Models\SystemHeader;
use Illuminate\Http\Request;

class SystemHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemHeaders = SystemHeader::latest()->paginate(10);
        return view('admin.system_header.index', compact('systemHeaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.system_header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemHeaderRequest $request)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        SystemHeader::create([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
        ]);

        return redirect()->route('system_headers.index');
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
    public function show(SystemHeader  $systemHeader)
    {
        return  view('admin.system_header.show' , compact('systemHeader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemHeader $systemHeader)
    {
        return  view('admin.system_header.edit' , compact('systemHeader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemHeaderRequest $request, SystemHeader $systemHeader)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($systemHeader->image);
        }else{
            $image = $systemHeader->image;
        }
        $systemHeader->update([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,

        ]);

        return redirect()->route('system_headers.index');
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
    public function destroy(SystemHeader $systemHeader)
    {
        $systemHeader->delete();
        $this->deleteImage($systemHeader->image);
        return  redirect()->route('system_headers.index');
    }
}
