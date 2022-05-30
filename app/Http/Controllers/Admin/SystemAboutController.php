<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\System\StoreSystemRequest;
use App\Http\Requests\Admin\System\UpdateSystemRequest;
use App\Http\Requests\Admin\SystemAbout\StoreSystemAboutRequest;
use App\Http\Requests\Admin\SystemAbout\UpdateSystemAboutRequest;
use App\Models\System;
use App\Models\SystemAbout;
use Illuminate\Http\Request;

class SystemAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemAbouts = SystemAbout::latest()->paginate(10);
        return view('admin.system_about.index', compact('systemAbouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.system_about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemAboutRequest $request)
    {

        SystemAbout::create([
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('system_abouts.index');
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
    public function show(SystemAbout $systemAbout)
    {
        return  view('admin.system_about.show' , compact('systemAbout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemAbout $systemAbout)
    {
        return  view('admin.system_about.edit' , compact('systemAbout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemAboutRequest $request, SystemAbout $systemAbout)
    {


        $systemAbout->update([
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,

        ]);

        return redirect()->route('system_abouts.index');
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
    public function destroy(SystemAbout $systemAbout)
    {
        $systemAbout->delete();
        return  redirect()->route('system_abouts.index');
    }
}
