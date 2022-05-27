<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CardHeader\StoreCardHeaderController;
use App\Http\Requests\Admin\CardHeader\StoreCardHeaderRequest;
use App\Models\CardHeader;
use Illuminate\Http\Request;

class CardHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardHeaders = CardHeader::latest()->paginate(10);
        return view('admin.card_header.index', compact('cardHeaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.card_header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardHeaderRequest $request)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        CardHeader::create([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('card_headers.index');
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
    public function show(CardHeader $cardHeader)
    {
        return  view('admin.card_header.show' , compact('cardHeader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CardHeader $cardHeader)
    {
        return  view('admin.card_header.edit' , compact('cardHeader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardHeader $cardHeader)
    {

        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
            $this->deleteImage($cardHeader->image);
        }else{
            $image = $cardHeader->image;
        }
        $cardHeader->update([
            'image' => $image ,
            'title_uz' => $request->title_uz ,
            'title_ru' => $request->title_ru ,
            'title_en' => $request->title_en ,
            'info_uz' => $request->info_uz ,
            'info_ru' => $request->info_ru ,
            'info_en' => $request->info_en ,
        ]);

        return redirect()->route('card_headers.index');
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
    public function destroy(CardHeader $cardHeader)
    {
        $cardHeader->delete();
        $this->deleteImage($cardHeader->image);
        return  redirect()->route('card_headers.index');
    }
}
