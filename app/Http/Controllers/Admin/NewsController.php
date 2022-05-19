<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return  view('admin.news.index' , compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        News::create(
            [
                'title_uz' => $request->title_uz ,
                'title_ru' => $request->title_ru ,
                'title_en' => $request->title_en ,
                'text_uz' => $request->text_uz ,
                'text_ru' => $request->text_ru ,
                'text_en' => $request->text_en ,
                'slug' => $request->slug ,
                'status' => $request->status ,
                'image' => $image ,
                'category_new_id' => $request->category ,

            ]
        );
        return redirect()->route('news.index');
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
    public function show(News $news)
    {
        return view('admin.news.show' , compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit' , compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $image = '';
        if(isset($request->image)){
            $image = $this->uploadImage($request);
        }else{
            $image = $news->image;
        }
        $news->update(
            [
                'title_uz' => $request->title_uz ,
                'title_ru' => $request->title_ru ,
                'title_en' => $request->title_en ,
                'text_uz' => $request->text_uz ,
                'text_ru' => $request->text_ru ,
                'text_en' => $request->text_en ,
                'slug' => $request->slug ,
                'status' => $request->status ,
                'image' => $image ,
                'category_new_id' => $request->category ,

            ]
        );
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
