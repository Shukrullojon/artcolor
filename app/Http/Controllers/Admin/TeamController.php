<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ADmin\Team\StoreRequest;
use App\Http\Requests\Admin\Team\UpdateRequest;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate(20);
        return view('admin.team.index',[
            'teams' => $teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
        Team::create([
            'fio_uz' => $request->fio_uz,
            'fio_ru' => $request->fio_ru,
            'fio_en' => $request->fio_en,
            'status' => $request->status,
            'position_uz' => $request->position_uz,
            'position_ru' => $request->position_ru,
            'position_en' => $request->position_en,
            'image' => $image,
        ]);
        return redirect()->route('team.index')->with("success","Saved successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Team $team)
    {
        $image = $team->image;
        if(isset($request->image)){
            $this->deleteImage($team->image);
            $image = $this->uploadImage($request);
        }
        $team->update([
            'fio_uz' => $request->fio_uz,
            'fio_ru' => $request->fio_ru,
            'fio_en' => $request->fio_en,
            'status' => $request->status,
            'position_uz' => $request->position_uz,
            'position_ru' => $request->position_ru,
            'position_en' => $request->position_en,
            'image' => $image,
        ]);
        return redirect()->route('team.index')->with("success","Update successful!");
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
    public function destroy(Team $team)
    {
        $this->deleteImage($team->image);
        $team->delete();
        return redirect()->route('team.index')->with('success',"Delete successful!");
    }
}
