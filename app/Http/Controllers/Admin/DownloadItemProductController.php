<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadItemFilter;
use App\Models\DownloadItemProduct;
use Illuminate\Http\Request;

class DownloadItemProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DownloadItemProduct::latest()->paginate();
        return view('admin.download-item-product.index',[
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filters = DownloadItemFilter::latest()->get();
        return view('admin.download-item-product.create',[
            'filters' => $filters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        $file = '';
        if(isset($request->file)){
            $origin = $request->file('file')->getClientOriginalExtension();
            $mb = $request->file('file')->getSize();
            $file=rand(1000,9999).time().".".$request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path().'/uploads/', $file);
        }
        DownloadItemProduct::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'image' => $image,
            'file' => $file,
            'origin' => $origin,
            'mb' => $mb,
            'filter_id' => $request->filter_id,
        ]);
        return redirect()->route('downloaditemproduct.index')->with("success","Saved successful!");
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DownloadItemProduct::where('id',$id)->first();
        return view('admin.download-item-product.show',[
            'product'=>$product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DownloadItemProduct::where('id',$id)->first();
        $filters = DownloadItemFilter::latest()->get();
        return view('admin.download-item-product.edit',[
            'product' => $product,
            'filters' => $filters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = DownloadItemProduct::where('id',$id)->first();
        $image = $product->image;
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }
        $file = $product->file;
        $origin = $product->origin;
        $mb = $product->mb;
        if(isset($request->file)){
            $origin = $request->file('file')->getClientOriginalExtension();
            $mb = $request->file('file')->getSize();
            $file=rand(1000,9999).time().".".$request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path().'/uploads/', $file);
        }
        $product->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'image' => $image,
            'file' => $file,
            'origin' => $origin,
            'mb' => $mb,
            'filter_id' => $request->filter_id,
        ]);
        return redirect()->route('downloaditemproduct.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DownloadItemProduct::where('id',$id)->first();
        $this->deleteImage($product->image);
        $product->delete();
        return redirect()->route('downloaditemproduct.index')->with('success',"Delete successful!");
    }
}
