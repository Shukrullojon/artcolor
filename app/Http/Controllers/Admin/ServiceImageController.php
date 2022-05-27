<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use App\Http\Requests\Admin\ServiceImage\StoreServiceImageRequest;
use App\Http\Requests\Admin\ServiceImage\UpdateServiceImageRequest;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

class ServiceImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceImages = ServiceImage::latest()->paginate(20);
        return view('admin.service_image.index' , compact('serviceImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceImageRequest $request)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        ServiceImage::create([
            'image' => $image ,
        ]);

        return redirect()->route('service_images.index');
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
    public function show(ServiceImage $serviceImage)
    {
        return view('admin.service_image.show', compact('serviceImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceImage $serviceImage)
    {
        return view('admin.service_image.edit', compact('serviceImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceImageRequest $request, ServiceImage $serviceImage)
    {
        $image = '';
        if(isset($request->image)){
            $this->deleteImage($serviceImage->image);
            $image = $this->uploadImage($request);
        }else{
            $image = $serviceImage->image;
        }
        $serviceImage->update([
            'image' => $image ,
        ]);

        return redirect()->route('service_images.index');
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
    public function destroy(ServiceImage $serviceImage)
    {
        $this->deleteImage($serviceImage->image);
        $serviceImage->delete();
        return redirect()->route('service_images.index');
    }
}
