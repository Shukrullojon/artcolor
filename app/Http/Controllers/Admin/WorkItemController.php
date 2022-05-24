<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkItem\StoreWorkItemRequest;
use App\Http\Requests\Admin\WorkItem\UpdateWorkItemRequest;
use App\Models\WorkItem;
use Illuminate\Http\Request;

class WorkItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workItems = WorkItem::latest()->paginate(10);
        return view('admin.work_item.index' , compact('workItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work_item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkItemRequest $request)
    {
        $image = '';
        $product_image  = '';
        $image_small = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request->file('image'));
        }
        if(isset($request->product_image)){
             $product_image = $this->uploadImage($request->file('product_image'));
        }
        if(isset($request->image_small)){
            $image_small = $this->uploadImage($request->file('image_small'));
        }

        WorkItem::create([
            'name_uz' => $request->name_uz ,
            'name_ru' => $request->name_ru ,
            'name_en' => $request->name_en ,
            'region_uz' => $request->region_uz ,
            'region_ru' => $request->region_ru ,
            'region_en' => $request->region_en ,
            'application_uz' => $request->application_uz ,
            'application_ru' => $request->application_ru ,
            'application_en' => $request->application_en ,
            'product_image' => $product_image ,
            'image_small' => $image_small ,
            'image' => $image ,
        ]);

        return redirect()->route('work_items.index');
    }

    public function uploadImage($image){
        $name =  rand(1000,9999).time()."." . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/'), $name);
        return $name;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(WorkItem $workItem)
    {
        return view('admin.work_item.show' , compact('workItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkItem $workItem)
    {
        return view('admin.work_item.edit' , compact('workItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkItemRequest $request, WorkItem $workItem)
    {
        $image = '';
        $product_image  = '';
        $image_small = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request->file('image'));
        }else{
            $image = $workItem->image;
        }
        if(isset($request->product_image)){
            $product_image = $this->uploadImage($request->file('product_image'));
        }else{
            $product_image = $workItem->product_image;
        }
        if(isset($request->image_small)){
            $image_small = $this->uploadImage($request->file('image_small'));
        }else{
            $image_small = $workItem->image_small;
        }

        $workItem->update([
            'name_uz' => $request->name_uz ,
            'name_ru' => $request->name_ru ,
            'name_en' => $request->name_en ,
            'region_uz' => $request->region_uz ,
            'region_ru' => $request->region_ru ,
            'region_en' => $request->region_en ,
            'application_uz' => $request->application_uz ,
            'application_ru' => $request->application_ru ,
            'application_en' => $request->application_en ,
            'product_image' => $product_image ,
            'image_small' => $image_small ,
            'image' => $image ,
        ]);

        return redirect()->route('work_items.index');
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
    public function destroy(WorkItem $workItem)
    {
        $this->deleteImage($workItem->image);
        $this->deleteImage($workItem->product_image);
        $this->deleteImage($workItem->image_small);
        $workItem->delete();
        return redirect()->route('work_items.index');
    }
}
