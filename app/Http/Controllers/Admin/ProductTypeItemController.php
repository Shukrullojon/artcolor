<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Models\ProductTypeItem;
use Illuminate\Http\Request;

class ProductTypeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProductTypeItem::latest()->paginate(20);
        return view('admin.product-type-item.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProductType::where('status',1)->get();
        return view('admin.product-type-item.create',[
            'types' => $types,
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
        ProductTypeItem::create([
            'product_type_id' => $request->product_type_id,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'image' => $image,
        ]);
        return redirect()->route('producttypeitem.index')->with("success","Saved successful!");
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
        $product_type_item = ProductTypeItem::where('id',$id)->first();
        return view('admin.product-type-item.show', compact('product_type_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productTypeItem = ProductTypeItem::where('id',$id)->first();
        $types = ProductType::where('status',1)->get();
        return view('admin.product-type-item.edit',[
            'productTypeItem' => $productTypeItem,
            'types' => $types
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
        $productTypeItem = ProductTypeItem::where('id',$id)->first();
        $image = $productTypeItem->image;
        if(isset($request->image)){
            $this->deleteImage($productTypeItem->image);
            $image = $this->uploadImage($request);
        }
        $productTypeItem->update([
            'product_type_id' => $request->product_type_id,
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'image' => $image,
        ]);
        return redirect()->route('producttypeitem.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productTypeItem = ProductTypeItem::where('id',$id)->first();
        $this->deleteImage($productTypeItem->image);
        $productTypeItem->delete();
        return redirect()->route('producttypeitem.index')->with('success',"Delete successful!");
    }
}
