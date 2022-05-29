<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCharacter;
use App\Models\ProductDownload;
use App\Models\ProductFilter;
use App\Models\ProductImage;
use App\Models\ProductPrice;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.product.index',[
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
        $filters = ProductFilter::where('parent_id','!=',0)->latest()->get();
        $subs = SubCategory::latest()->get();
        return view('admin.product.create',[
            'filters' => $filters,
            'subs' => $subs,
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

        $product = Product::create([
            'sub_category_id'=>$request->sub_category_id,
            'filter_id'=>$request->filter_id,
            'title_uz'=>$request->title_uz,
            'title_ru'=>$request->title_ru,
            'title_en'=>$request->title_en,
            'info_uz'=>$request->info_uz,
            'info_ru'=>$request->info_ru,
            'info_en'=>$request->info_en,
            'application_uz'=>$request->application_uz,
            'application_ru'=>$request->application_ru,
            'application_en'=>$request->application_en,
            'compound_uz'=>$request->compound_uz,
            'compound_ru'=>$request->compound_ru,
            'compound_en'=>$request->compound_en,
            'consumption_uz'=>$request->consumption_uz,
            'consumption_ru'=>$request->consumption_ru,
            'consumption_en'=>$request->consumption_en,
            'peculiarit_uz'=>$request->peculiarit_uz,
            'peculiarit_ru'=>$request->peculiarit_ru,
            'peculiarit_en'=>$request->peculiarit_en,
            'accordion_title_uz'=>$request->accordion_title_uz,
            'accordion_title_ru'=>$request->accordion_title_ru,
            'accordion_title_en'=>$request->accordion_title_en,
            'accordion_info_uz'=>$request->accordion_info_uz,
            'accordion_info_ru'=>$request->accordion_info_ru,
            'accordion_info_en'=>$request->accordion_info_en,
        ]);

        if(isset($request->image)){
            foreach($request->image as $image){
                $name=rand(1000,9999).time().".".$image->getClientOriginalExtension();
                $image->move(public_path().'/uploads/', $name);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $name,
                    'type' => 1
                ]);
            }
        }

        if(isset($request->gallery_image)){
            foreach($request->gallery_image as $image){
                $name=rand(1000,9999).time().".".$image->getClientOriginalExtension();
                $image->move(public_path().'/uploads/', $name);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $name,
                    'type' => 2
                ]);
            }
        }

        $inputs = $request->all();
        $character_uz = $inputs['character_uz'];
        $character_ru = $inputs['character_ru'];
        $character_en = $inputs['character_en'];
        foreach($character_uz as $key => $item){
            ProductCharacter::create([
                'product_id'=>$product->id,
                'title_uz' => $character_uz[$key] ?? "",
                'title_ru' => $character_ru[$key] ?? "",
                'title_en' => $character_en[$key] ?? "",
            ]);
        }

        $litr_uz = $inputs['litr_uz'];
        $litr_ru = $inputs['litr_ru'];
        $litr_en = $inputs['litr_en'];

        $price_uz = $inputs['price_uz'];
        $price_ru = $inputs['price_ru'];
        $price_en = $inputs['price_en'];
        foreach($litr_uz as $key => $item){
            ProductPrice::create([
                'product_id'=>$product->id,
                'litr_uz' => $litr_uz[$key] ?? "",
                'litr_ru' => $litr_ru[$key] ?? "",
                'litr_en' => $litr_en[$key] ?? "",
                'price_uz' => $price_uz[$key] ?? "",
                'price_ru' => $price_ru[$key] ?? "",
                'price_en' => $price_en[$key] ?? "",
            ]);
        }

        $download_uz = $inputs['download_uz'];
        $download_ru = $inputs['download_ru'];
        $download_en = $inputs['download_en'];

        $arr = [];
        foreach($request->download as $down){
            $origin = $down->getClientOriginalExtension();
            $size = $down->getSize();
            $name=rand(1000,9999).time().".".$down->getClientOriginalExtension();
            $down->move(public_path().'/uploads/', $name);
            $dow = ProductDownload::create([
                'product_id' => $product->id,
                'file' => $name,
                'origin'=>$down->getClientOriginalExtension(),
                'mb' => $size/1024
            ]);
            $arr[]=$dow->id;
        }

        foreach($arr as $key => $item){
            $download = ProductDownload::where('id',$item)->first();
            $download->update([
                'title_uz' => $download_uz[$key],
                'title_ru' => $download_ru[$key],
                'title_en' => $download_en[$key],
            ]);
        }

        return redirect()->route('product.index')->with("success","Saved successful!");
    }

    public function uploadImage($request){
        dd($request);
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
    public function show(Product $product)
    {
        return view('admin.product.show',[
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $filters = ProductFilter::where('parent_id','!=',0)->latest()->get();
        $subs = SubCategory::latest()->get();
        return view('admin.product.edit',[
            'product' => $product,
            'subs' => $subs,
            'filters'=>$filters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        dd($request->image);
        $product->update([
            'sub_category_id'=>$request->sub_category_id,
            'filter_id'=>$request->filter_id,
            'title_uz'=>$request->title_uz,
            'title_ru'=>$request->title_ru,
            'title_en'=>$request->title_en,
            'info_uz'=>$request->info_uz,
            'info_ru'=>$request->info_ru,
            'info_en'=>$request->info_en,
            'application_uz'=>$request->application_uz,
            'application_ru'=>$request->application_ru,
            'application_en'=>$request->application_en,
            'compound_uz'=>$request->compound_uz,
            'compound_ru'=>$request->compound_ru,
            'compound_en'=>$request->compound_en,
            'consumption_uz'=>$request->consumption_uz,
            'consumption_ru'=>$request->consumption_ru,
            'consumption_en'=>$request->consumption_en,
            'peculiarit_uz'=>$request->peculiarit_uz,
            'peculiarit_ru'=>$request->peculiarit_ru,
            'peculiarit_en'=>$request->peculiarit_en,
            'accordion_title_uz'=>$request->accordion_title_uz,
            'accordion_title_ru'=>$request->accordion_title_ru,
            'accordion_title_en'=>$request->accordion_title_en,
            'accordion_info_uz'=>$request->accordion_info_uz,
            'accordion_info_ru'=>$request->accordion_info_ru,
            'accordion_info_en'=>$request->accordion_info_en,
        ]);
        return redirect()->route('product.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success',"Delete successful!");
    }
}
