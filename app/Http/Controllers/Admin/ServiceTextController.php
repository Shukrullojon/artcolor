<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceText\StoreServiceTextRequest;
use App\Http\Requests\Admin\ServiceText\UpdateServiceTextRequest;
use App\Models\ServiceText;
use Illuminate\Http\Request;

class ServiceTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceTexts = ServiceText::latest()->paginate(10);
        return view('admin.service_text.index', compact('serviceTexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.service_text.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceTextRequest $request)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        ServiceText::create([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('service_texts.index');
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
    public function show(ServiceText $serviceText)
    {
        return  view('admin.service_text.show' , compact('serviceText'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceText $serviceText)
    {
        return  view('admin.service_text.edit' , compact('serviceText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceTextRequest $request, ServiceText $serviceText)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($serviceText->image);
        }else{
            $image = $serviceText->image;
        }
        $serviceText->update([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('service_texts.index');
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
    public function destroy(ServiceText $serviceText)
    {
        $this->deleteImage($serviceText->image);
        $serviceText->delete();
        return  redirect()->route('service_texts.index');
    }
}
