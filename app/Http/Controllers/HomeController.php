<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutAbout;
use App\Models\BranchAbout;
use App\Models\BranchHeader;
use App\Models\BuypageHeader;
use App\Models\CardAbout;
use App\Models\CardHeader;
use App\Models\Category;
use App\Models\CategoryNew;
use App\Models\CategoryText;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\ContactFooter;
use App\Models\ContactHeader;
use App\Models\ContactType;
use App\Models\Country;
use App\Models\DownloadAbout;
use App\Models\DownloadCategory;
use App\Models\DownloadHeader;
use App\Models\DownloadInfo;
use App\Models\DownloadItemFilter;
use App\Models\DownloadItemFooter;
use App\Models\DownloadItemHeader;
use App\Models\DownloadItemProduct;
use App\Models\GalleryAbout;
use App\Models\GalleryCategory;
use App\Models\GalleryFilter;
use App\Models\GalleryHeader;
use App\Models\GalleryItem;
use App\Models\GalleryItemFooter;
use App\Models\GalleryItemHeader;
use App\Models\GalleryVideo;
use App\Models\GalleryVideoFilter;
use App\Models\GalleryVideoFooter;
use App\Models\GalleryVideoHeader;
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
use App\Models\System;
use App\Models\SystemAbout;
use App\Models\SystemHeader;
use App\Models\SystemItem;
use App\Models\SystemItemHeader;
use App\Models\SystemProduct;
use App\Models\SystemSlider;
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


    public function index(Request $request)
    {
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

    public function about(Request $request){
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
        $header = NewHeader::select("title_$lang as title","info_$lang as info","button_url")->first();
        $categories = CategoryNew::select("id","name_$lang as name")->latest()->get();
        $news = News::select("id","category_new_id","title_$lang as title","text_$lang as text","image")->where('status',1)->latest()->get();
        return view('blog',[
            'header' => $header,
            'categories' => $categories,
            'news' => $news,
        ]);
    }

    public function blogItem($id){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $new = News::select("id","title_$lang as title","text_$lang as text","image","type","created_at")->where('id',$id)->first();
        $rand = News::select("id","title_$lang as title","text_$lang as text","image","type","created_at")->orderByRaw("RAND()")->get();

        return view('blog-item',[
            'new' => $new,
            'rand' => $rand,
        ]);
    }

    public function randblog(){
        $rand = News::select("id")->orderByRaw("RAND()")->first();
        return redirect()->route('blogitem',$rand->id);
    }

    public function contact(Request $request){
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
            $message .= "Contact type: ".$request->contact."\n";
            $message .= "Country: ".$request->country."\n";
            $message .= "Message: ".$request->message."\n";
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
        $header = ContactHeader::select("id","title_$lang as title","info_$lang as info","button_$lang as button","button_link")->first();
        $footer = ContactFooter::select("title_$lang as title","info_$lang as info")->first();
        $country = Country::select("title_$lang as title")->latest()->get();
        $type = ContactType::select("title_$lang as title")->latest()->get();
        return view('contact',[
            'header' => $header,
            'footer' => $footer,
            'country' => $country,
            'type' => $type,
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

    public function buypage(Request $request){
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
            if(!empty($product->title))
                $message .= "Product: ".$product->title."\n";
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
        $header = BuypageHeader::select("title_$lang as title","info_$lang as info")->latest()->first();
        $contact = Contact::select("id","email","phone_1")->latest()->first();
        return view('buypage',[
            'header' => $header,
            'contact' => $contact,
        ]);
    }

    public function branch(Request $request){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
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
            if(!empty($product->title))
                $message .= "Product: ".$product->title."\n";
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
        $header = BranchHeader::select("title_$lang as title","info_$lang as info","button_$lang as button","button_url")->latest()->first();
        $about = BranchAbout::select("title_$lang as title","info_$lang as info")->latest()->first();
        return view('branch',[
            'header' => $header,
            'about' => $about,
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

    public function productitem($id, Request $request){

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

    public function video(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = GalleryVideoHeader::select("title_$lang as title","info_$lang as info")->latest()->first();
        $footer = GalleryVideoFooter::select("title_$lang as title","info_$lang as info")->latest()->first();
        $filters = GalleryVideoFilter::select("id","title_$lang as title")->latest()->get();
        $videos = GalleryVideo::select("id","title_$lang as title","image","link","filter_id")->latest()->get();
        return view('video',[
            'header' => $header,
            'footer' => $footer,
            'filters' => $filters,
            'videos' => $videos,
        ]);
    }

    public function download(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = DownloadHeader::select("image","title_$lang as title","info_$lang as info")->latest()->first();
        $about = DownloadAbout::select("title_$lang as title","info_$lang as info")->latest()->first();
        $info = DownloadInfo::select("title_$lang as title","info_$lang as info")->latest()->first();
        $categories = DownloadCategory::select("id","image","title_$lang as title","info_$lang as info")->latest()->get();
        return view('download',[
            'header' => $header,
            'about' => $about,
            'info' => $info,
            'categories' => $categories,
        ]);
    }

    public function downloaditem($id){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = DownloadItemHeader::select("title_$lang as title")->latest()->first();
        $filter_1 = DownloadItemFilter::select("id","title_$lang as title")->where('type',1)->latest()->get();
        $filter_2 = DownloadItemFilter::select("id","title_$lang as title")->where('type',2)->latest()->get();
        $footer = DownloadItemFooter::select("title_$lang as title","info_$lang as info")->latest()->first();
        $products = DownloadItemProduct::select("id","filter_id","image","file","origin","mb","title_$lang as title")->latest()->paginate(20);
        return view('downloaditem',[
            'header' => $header,
            'filter_1' => $filter_1,
            'filter_2' => $filter_2,
            'footer' => $footer,
            'products' => $products,
        ]);
    }

    public function downloaditemdownload($id){
        $download = DownloadItemProduct::where('id',$id)->first();
        $filepath = public_path('uploads/'.$download->file);
        return Response()->download($filepath);
    }

    public function system(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = SystemHeader::select("title_$lang as title","image")->latest()->first();
        $systems = System::select("id","title_$lang as title","info_$lang as info","image")->latest()->get();
        return view('system',[
            'header' => $header,
            'systems' => $systems,
        ]);
    }

    public function systemitem($id){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $header = SystemItemHeader::select("id","image","title_$lang as title","info_$lang as info")->latest()->first();
        $items = SystemItem::select("id","title_$lang as title","info_$lang as info","image")->where('system_id',$id)->latest()->get();
        $products = SystemProduct::select("id","title_$lang as title","file","image","origin","mb")->where('system_id',$id)->get();
        $silders= SystemSlider::select("id","title_$lang as title","image")->get();
        $about = SystemAbout::select("id","title_$lang as title","info_$lang as info")->latest()->first();
        return view('systemitem',[
            'header' => $header,
            'items' => $items,
            'products' => $products,
            'silders' => $silders,
            'about' => $about,
        ]);
    }

    public function downloadsystem($id){
        $download = SystemProduct::where('id',$id)->first();
        $filepath = public_path('uploads/'.$download->file);
        return Response()->download($filepath);
    }
}
