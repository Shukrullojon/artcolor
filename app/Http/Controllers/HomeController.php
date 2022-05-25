<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutAbout;
use App\Models\CardAbout;
use App\Models\CardHeader;
use App\Models\Category;
use App\Models\CategoryNew;
use App\Models\CategoryText;
use App\Models\Item;
use App\Models\NewHeader;
use App\Models\Product;
use App\Models\ProductFilter;
use App\Models\ProductType;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubCategoryHeader;
use App\Models\Team;
use App\Models\Text;
use App\Models\Video;
use App\Models\Work;
use App\Models\WorkItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

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
        $subs = SubCategory::select("id","title_$lang as title")->latest()->get();
        $products = Product::select("id","filter_id","title_$lang as title","application_$lang as application","compound_$lang as compound")->limit(8)->latest()->get();
        $work = Work::select("title_$lang as title")->latest()->first();
        $workitems = WorkItem::select("name_$lang as name","region_$lang as region","application_$lang as application","product_image","image","image_small")->latest()->get();
        return view('index',[
            'sliders' => $sliders,
            'about' => $about,
            'items' => $items,
            'video' => $video,
            'productTypes' => $productTypes,
            'subs' => $subs,
            'products' => $products,
            'work' => $work,
            'workitems' => $workitems,
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

    public function product(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $categories = Category::select('id',"title_$lang as title","info_$lang as info","image","slug","colls")->latest()->get();
        $cattext = CategoryText::select("id","title_$lang as title","info_$lang as info")->latest()->first();
        return view('product',[
            'categories' => $categories,
            'cattext' => $cattext,
        ]);
    }

    public function subcategory($id = null){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $subheader = SubCategoryHeader::select("id","title_$lang as title","info_$lang as info","image",)->first();
        $category = Category::select("title_$lang as title")->where('id',$id)->first();
        $subcategory = SubCategory::select("sub_categories.id","sub_categories.title_$lang as title","sub_categories.info_$lang as info","sub_categories.image",DB::raw('count(products.id) as count'),)
            ->leftJoin('products',function ($join){
                $join->on('sub_categories.id','=','products.sub_category_id');
            })->groupBy('sub_categories.id')
            ->where('category_id',$id)
            ->get();

        return view('subcategory',[
            'subheader' => $subheader,
            'category' => $category,
            'subcategory' => $subcategory
        ]);
    }

    public function carditem($id, ){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = CardHeader::select("title_$lang as title","info_$lang as info","image")->first();
        $about = CardAbout::select("title_$lang as title","info_$lang as info")->first();
        $subcategory = SubCategory::select("title_$lang as title")->where('id',$id)->first();
        $filters = ProductFilter::select("id","title_$lang as title")->where('parent_id',0)->get();
        $products = Product::select("id","filter_id","title_$lang as title","info_$lang as info")->where('sub_category_id',$id)->latest()->get();
        return view('card-item',[
            'header' => $header,
            'about' => $about,
            'subcategory' => $subcategory,
            'filters' => $filters,
            'products' => $products,
        ]);
    }

    public function productitem($id){
        return view('product-item');
    }
}
