<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutAbout;
use App\Models\CategoryNew;
use App\Models\Item;
use App\Models\NewHeader;
use App\Models\ProductType;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Text;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $sliders = Slider::select("title_$lang as title","title_short_$lang as title_short", "info_$lang as info", "button_$lang as button","button_url","button_target","image_right","image_back")->where('status',1)->get();
        $about = About::select("title_$lang as title","title_short_$lang as title_short", "text_$lang as text","text_right_$lang as text_right", "image","video_link","video_image")->first();
        $items = Item::select("title_$lang as title", "count")->latest()->get();
        $video = Video::latest()->first();
        $productTypes = ProductType::select("id","title_$lang as title","info_$lang as info","title_short_$lang as title_short","text_$lang as text","button_url")->where('status',1)->get();
        return view('index',[
            'sliders' => $sliders,
            'about' => $about,
            'items' => $items,
            'video' => $video,
            'productTypes' => $productTypes,
        ]);
    }

    public function about(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $about = About::select("title_$lang as title","title_short_$lang as title_short", "text_$lang as text","text_right_$lang as text_right", "image","video_link","video_image")->first();
        $items = Item::select("title_$lang as title", "count")->latest()->get();
        $teams = Team::select("fio_$lang as fio", "image","position_$lang as position")->where('status',1)->latest()->get();
        $aboutAbout = AboutAbout::select("title_$lang as title","info_$lang as info","text_$lang as text","image")->first();
        $aboutText = Text::select("title_$lang as title","info_$lang as info","additional_$lang as additional")->first();
        return view('about',[
            'about' => $about,
            'aboutAbout' => $aboutAbout,
            'items' => $items,
            'teams' => $teams,
            'aboutText' => $aboutText,
        ]);
    }

    public function blog(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $newHeader = NewHeader::select("title_$lang as title","info_$lang as info","button_url")->first();
        $categoryNew =CategoryNew::select("name_$lang as name")->latest()->get();
        return view('blog',[
            'newHeader' => $newHeader,
            'categoryNew' => $categoryNew,
        ]);
    }

    public function blogItem($id){
        return view('blog-item');
    }

    public function contact(){
        return view('contact');
    }
}
