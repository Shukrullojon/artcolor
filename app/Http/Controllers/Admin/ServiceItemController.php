<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceItem\StoreServiceItemRequest;
use App\Http\Requests\Admin\ServiceItem\UpdateServiceItemRequest;
use App\Http\Requests\Admin\ServiceText\StoreServiceTextRequest;
use App\Http\Requests\Admin\ServiceText\UpdateServiceTextRequest;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\ServiceText;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceItems = ServiceItem::latest()->paginate(10);
        return view('admin.service_item.index', compact('serviceItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return  view('admin.service_item.create' , compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceItemRequest $request)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        ServiceItem::create([
            'service_id' => $request->service_id ,
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('service_items.index');
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
    public function show(ServiceItem $serviceItem)
    {
        return  view('admin.service_item.show' , compact('serviceItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceItem $serviceItem)
    {
        $services = Service::all();
        return  view('admin.service_item.edit' , compact(['serviceItem' , 'services']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceItemRequest $request, ServiceItem $serviceItem)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($serviceItem->image);
        }else{
            $image = $serviceItem->image;
        }
        $serviceItem->update([
            'image' => $image ,
            'service_id' => $request->service_id ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('service_items.index');
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
    public function destroy(ServiceItem $serviceItem)
    {
        $this->deleteImage($serviceItem->image);
        $serviceItem->delete();
        return redirect()->route('service_items.index');
    }
}
