<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SystemHeader\StoreSystemHeaderRequest;
use App\Http\Requests\Admin\SystemHeader\UpdateSystemHeaderRequest;
use App\Http\Requests\Admin\SystemSlider\StoreSystemSliderRequest;
use App\Http\Requests\Admin\SystemSlider\UpdateSystemSliderRequest;
use App\Models\SystemHeader;
use App\Models\SystemSlider;
use Illuminate\Http\Request;

class SystemSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemSliders = SystemSlider::latest()->paginate(10);
        return view('admin.system_slider.index', compact('systemSliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.system_slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemSliderRequest $request)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        SystemSlider::create([
            'image' => $image ,
        ]);

        return redirect()->route('system_sliders.index');
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
    public function show(SystemSlider  $systemSlider)
    {
        return  view('admin.system_slider.show' , compact('systemSlider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemSlider $systemSlider)
    {
        return  view('admin.system_slider.edit' , compact('systemSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemSliderRequest $request,SystemSlider $systemSlider)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($systemSlider->image);
        }else{
            $image = $systemSlider->image;
        }
        $systemSlider->update([
            'image' => $image ,
        ]);

        return redirect()->route('system_sliders.index');
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
    public function destroy(SystemSlider $systemSlider)
    {
        $systemSlider->delete();
        $this->deleteImage($systemSlider->image);
        return  redirect()->route('system_sliders.index');
    }
}
