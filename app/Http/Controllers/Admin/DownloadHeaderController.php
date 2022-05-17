<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DownloadHeader\StoreRequest;
use App\Http\Requests\Admin\DownloadHeader\UpdateRequest;
use App\Models\DownloadHeader;
use Illuminate\Http\Request;

class DownloadHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = DownloadHeader::latest()->paginate(20);
        return view('admin.download-header.index',[
            'headers' => $headers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.download-header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        DownloadHeader::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'image' => $image,
        ]);
        return redirect()->route('download-header.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DownloadHeader $downloadHeader)
    {
        return view('admin.download-header.show', compact('downloadHeader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DownloadHeader $downloadHeader)
    {
        return view('admin.download-header.edit',compact('downloadHeader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, DownloadHeader $downloadHeader)
    {
        $image = $downloadHeader->image;
        if(isset($request->image)){
            $this->deleteImage($downloadHeader->image);
            $image = $this->uploadImage($request);
        }
        $downloadHeader->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'image' => $image,
        ]);
        return redirect()->route('download-header.index')->with("success","Update successful!");
    }

    public function uploadImage($request){
        $name =  rand(1000,9999).time()."." . $request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads/'), $name);
        return $name;
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
    public function destroy(DownloadHeader $downloadHeader)
    {
        $this->deleteImage($downloadHeader->image);
        $downloadHeader->delete();
        return redirect()->route('download-header.index')->with('success',"Delete successful!");
    }
}
