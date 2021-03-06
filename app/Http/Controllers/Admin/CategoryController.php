<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryItem;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('admin.category.index',[
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        $category = Category::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'colls' => $request->colls,
            'image' => $image,
        ]);

        $inputs = $request->all();
        $item_uz = $inputs['item_uz'];
        $item_ru = $inputs['item_ru'];
        $item_en = $inputs['item_en'];
        foreach($item_uz as $key => $item){
            CategoryItem::create([
                'category_id' => $category->id,
                'title_uz' => $item_uz[$key] ?? "",
                'title_ru' => $item_ru[$key] ?? "",
                'title_en' => $item_en[$key] ?? "",
            ]);
        }
        return redirect()->route('category.index')->with("success","Saved successful!");
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
    public function show(Category $category)
    {
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $id = $category->id;
        $image = $category->image;
        if(isset($request->image)){
            $this->deleteImage($category->image);
            $image = $this->uploadImage($request);
        }
        $category = $category->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'info_uz' => $request->info_uz,
            'info_ru' => $request->info_ru,
            'info_en' => $request->info_en,
            'colls' => $request->colls,
            'image' => $image,
        ]);

        CategoryItem::where('category_id',$id)->delete();
        $inputs = $request->all();
        $item_uz = $inputs['item_uz'];
        $item_ru = $inputs['item_ru'];
        $item_en = $inputs['item_en'];
        foreach($item_uz as $key => $item){
            if(!empty($item_uz[$key])){
                CategoryItem::create([
                    'category_id' => $id,
                    'title_uz' => $item_uz[$key] ?? "",
                    'title_ru' => $item_ru[$key] ?? "",
                    'title_en' => $item_en[$key] ?? "",
                ]);
            }
        }
        return redirect()->route('category.index')->with("success","Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->deleteImage($category->image);
        CategoryItem::where('category_id',$category->id)->delete();
        $category->delete();
        return redirect()->route('category.index')->with('success',"Delete successful!");
    }
}
