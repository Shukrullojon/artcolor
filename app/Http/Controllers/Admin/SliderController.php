<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(20);
        return view('admin.slider.index',[
            'sliders' => $sliders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_right = '';
        if(isset($request->image_right)){
            $image_right = $this->uploadImage($request);
        }

        $image_back = '';
        if(isset($request->image_back)){
            $image_back = $this->uploadImageBack($request);
        }
        Slider::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_short_uz' => $request->title_short_uz,
            'title_short_ru' => $request->title_short_ru,
            'title_short_en' => $request->title_short_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'button_uz' => $request->button_uz,
            'button_ru' => $request->button_ru,
            'button_en' => $request->button_en,
            'button_url' => $request->button_url,
            'button_target' => $request->button_target,
            'image_right' => $image_right,
            'image_back' => $image_back,
            'status' => $request->status,
        ]);

        return redirect()->route('slider.index')->with("success","Saved successful!");
    }

    public function uploadImage($request){
        $name =  rand(1000,9999).time()."." . $request->file('image_right')->getClientOriginalExtension();
        $request->image_right->move(public_path('uploads/'), $name);
        return $name;
    }

    public function uploadImageBack($request){
        $name =  rand(1000,9999).time()."." . $request->file('image_back')->getClientOriginalExtension();
        $request->image_back->move(public_path('uploads/'), $name);
        return $name;
    }

    public function deleteImage($data){
        if(file_exists(public_path('uploads/'.$data))){
            unlink(public_path('uploads/'.$data));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $image_right = $slider->image_right;
        if(isset($request->image_right)){
            $image_right = $this->uploadImage($request);
        }

        $image_back = $slider->image_back;
        if(isset($request->image_back)){
            $image_back = $this->uploadImageBack($request);
        }

        $slider->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_short_uz' => $request->title_short_uz,
            'title_short_ru' => $request->title_short_ru,
            'title_short_en' => $request->title_short_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'button_uz' => $request->button_uz,
            'button_ru' => $request->button_ru,
            'button_en' => $request->button_en,
            'button_url' => $request->button_url,
            'button_target' => $request->button_target,
            'image_right' => $image_right,
            'image_back' => $image_back,
            'status' => $request->status,
        ]);
        return redirect()->route('slider.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $this->deleteImage($slider->image_right);
        $this->deleteImage($slider->image_back);
        $slider->delete();
        return redirect()->route('slider.index')->with('success',"Delete successful!");
    }
}
