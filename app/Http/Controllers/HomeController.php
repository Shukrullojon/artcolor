<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutAbout;
use App\Models\CardAbout;
use App\Models\CardHeader;
use App\Models\Category;
use App\Models\CategoryNew;
use App\Models\CategoryText;
use App\Models\Comment;
use App\Models\ContactFooter;
use App\Models\ContactHeader;
use App\Models\GalleryAbout;
use App\Models\GalleryCategory;
use App\Models\GalleryFilter;
use App\Models\GalleryHeader;
use App\Models\GalleryItem;
use App\Models\GalleryItemFooter;
use App\Models\GalleryItemHeader;
use App\Models\Item;
use App\Models\NewHeader;
use App\Models\News;
use App\Models\PortfolioAbout;
use App\Models\PortfolioCharacter;
use App\Models\PortfolioHeader;
use App\Models\PortfolioImage;
use App\Models\PortfolioProduct;
use App\Models\Product;
use App\Models\ProductDownload;
use App\Models\ProductFilter;
use App\Models\ProductType;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\ServiceItem;
use App\Models\ServiceItemHeader;
use App\Models\ServiceText;
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
        $news = News::select("id","title_$lang as title","type","updated_at")->where('status',1)->latest()->limit(10)->get();

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
            'news' => $news,
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
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = ContactHeader::select("id","title_$lang as title","info_$lang as info","button_$lang as button","button_link")->first();
        $footer = ContactFooter::select("title_$lang as title","info_$lang as info")->first();
        return view('contact',[
            'header' => $header,
            'footer' => $footer,
        ]);
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
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $product = Product::select(
            "id",
            "sub_category_id",
            "title_$lang as title",
            "info_$lang as info",
            "application_$lang as application",
            "compound_$lang as compound",
            "consumption_$lang as consumption",
            "peculiarit_$lang as peculiarit",
            "accordion_title_$lang as accordion_title",
            "accordion_info_$lang as accordion_info")
            ->where('id',$id)->first();
        return view('product-item',[
            'product' => $product,
        ]);
    }

    public function productdownload($id){
        $download = ProductDownload::where('id',$id)->first();
        $filepath = public_path('uploads/'.$download->file);
        return Response()->download($filepath);
    }

    public function service(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $serviceheader = ServiceText::select("title_$lang as title","info_$lang as info","image")->first();
        $services = Service::select("id","title_$lang as title","image")->latest()->get();
        return view("service",[
            'serviceheader' => $serviceheader,
            'services' => $services,
        ]);
    }

    public function serviceitem(Request $request, $id){
        $sms = '';
        if(isset($request->fio)){
            Comment::create([
                "fio" => $request->fio,
                "phone" => $request->number,
                "email" => $request->email,
            ]);
            $sms = "Arizangiz qabul qilindi!";
            $message = '';
            $message .= "Ism: ".$request->fio."\n";
            $message .= "Telefon: ".$request->number."\n";
            $message .= "Email: ".$request->email."\n";

            $method = "sendMessage";
            $data = [];
            $data['chat_id'] = "-1001442690995";
            $data['text'] = $message;
            $url = "https://api.telegram.org/bot5380923873:AAHxbU-4rmbstFn0Rw_Tj_QXU2q4QAi_yIU/" . $method;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $res = curl_exec($ch);
        }
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $serviceitems = ServiceItem::select("image","title_$lang as title","info_$lang as info")->where('service_id',$id)->latest()->get();
        $image = ServiceImage::select("image")->latest()->first();
        $header = ServiceItemHeader::select("title_$lang as title","button_$lang as button","button_url")->where("service_id",$id)->latest()->first();
        return view('serviceitem',[
            'serviceitems' => $serviceitems,
            'image' => $image,
            'header' => $header,
        ])->with("success",$sms);;
    }

    public function gallery(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = GalleryHeader::select("title_$lang as title","info_$lang as info","image")->first();
        $categories = GalleryCategory::select("id","button_url","title_$lang as title","info_$lang as info","image")->latest()->get();
        $about = GalleryAbout::select("title_$lang as title","info_$lang as info")->first();
        return view('gallery',[
            'header' => $header,
            'categories' => $categories,
            'about' => $about,
        ]);
    }

    public function galleryitem(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = GalleryItemHeader::select("title_$lang as title")->first();
        $items = GalleryItem::select("filter_id","image","title_$lang as title")->latest()->get();
        $filters = GalleryFilter::where('parent_id',0)->latest()->get();
        $footer = GalleryItemFooter::select("title_$lang as title","info_$lang as info")->first();
        return view('gallery-item',[
            'header' => $header,
            'items' => $items,
            'filters' => $filters,
            'footer' => $footer,
        ]);
    }

    public function portfolio(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = PortfolioHeader::select("id","title_$lang as title")->latest()->first();
        $about = PortfolioAbout::select("info_$lang as info","social_$lang as social","link")->latest()->first();
        $images = PortfolioImage::select("image")->latest()->get();
        $characters = PortfolioCharacter::select("title_$lang as title","info_$lang as info")->latest()->get();
        $products = PortfolioProduct::select("id","title_$lang as title","image","file","origin","mb")->latest()->get();
        return view('portfolio',[
            'header' => $header,
            'about' => $about,
            'images'=>$images,
            'characters' => $characters,
            'products' => $products,
        ]);
    }

    public function portfoliodownload($id){
        $download = PortfolioProduct::where('id',$id)->first();
        $filepath = public_path('uploads/'.$download->file);
        return Response()->download($filepath);
    }
}
