<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Activity\StoreActivityRequest;
use App\Http\Requests\Admin\Activity\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities  = Activity::latest()->paginate(10);
        return view('admin.activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityRequest $request)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        Activity::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_ru,
            'short_text_uz' => $request->short_text_uz,
            'short_text_ru' => $request->short_text_ru,
            'short_text_en' => $request->short_text_en,
            'text_uz' => $request->text_uz,
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
            'image' => $image,
        ]);
        return redirect()->route('activity.index')->with("success","Saved successful!");
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
    public function show(Activity $activity)
    {
        return view('admin.activity.show' ,compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('admin.activity.edit' , compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }else{
            $image = $activity->image;
        }
        $activity->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_ru,
            'short_text_uz' => $request->short_text_uz,
            'short_text_ru' => $request->short_text_ru,
            'short_text_en' => $request->short_text_en,
            'text_uz' => $request->text_uz,
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
            'image' => $image,
        ]);
        return redirect()->route('activity.index')->with("success","Updated successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activity.index');
    }
}
