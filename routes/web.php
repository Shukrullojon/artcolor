<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Auth::routes();

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name("index");

Route::get('/about',[\App\Http\Controllers\HomeController::class,'about'])->name('about');
Route::get('/blog',[\App\Http\Controllers\HomeController::class,'blog'])->name('blog');
Route::get('/blogitem/{id}',[\App\Http\Controllers\HomeController::class,'blogitem'])->name('blogitem');
Route::get('/randblog',[\App\Http\Controllers\HomeController::class,'randblog'])->name('randblog');
Route::get('/contact',[\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/product',[\App\Http\Controllers\HomeController::class,'product'])->name('product');
Route::get('/subcategory/{id?}',[\App\Http\Controllers\HomeController::class,'subcategory'])->name('subcategory');
Route::get('/carditem/{id}',[\App\Http\Controllers\HomeController::class,'carditem'])->name('carditem');
Route::get('/productitem/{id}',[\App\Http\Controllers\HomeController::class,'productitem'])->name('productitem');
Route::get('/productdownload/{id}',[\App\Http\Controllers\HomeController::class,'productdownload'])->name('productdownload');
Route::get('/service',[\App\Http\Controllers\HomeController::class,'service'])->name("service");
Route::get('/serviceitem/{id}',[\App\Http\Controllers\HomeController::class,'serviceitem'])->name("serviceitem");
Route::get('/gallery',[\App\Http\Controllers\HomeController::class,'gallery'])->name("gallery");
Route::get('/galleryitem',[\App\Http\Controllers\HomeController::class,'galleryitem'])->name("galleryitem");
Route::get("/buypage",[\App\Http\Controllers\HomeController::class,'buypage'])->name("buypage");
Route::get("/branch",[\App\Http\Controllers\HomeController::class,'branch'])->name("branch");
Route::get("/portfolio",[\App\Http\Controllers\HomeController::class,'portfolio'])->name("portfolio");
Route::get("/portfoliodownload/{id}",[\App\Http\Controllers\HomeController::class,'portfoliodownload'])->name("portfoliodownload");
Route::get("/download",[\App\Http\Controllers\HomeController::class,'download'])->name("download");
Route::get("/downloaditem/{id}",[\App\Http\Controllers\HomeController::class,'downloaditem'])->name("downloaditem");
Route::get('/downloaditemdownload/{id}',[\App\Http\Controllers\HomeController::class,'downloaditemdownload'])->name('downloaditemdownload');
Route::get("/video",[\App\Http\Controllers\HomeController::class,'video'])->name("video");
Route::get("/system",[\App\Http\Controllers\HomeController::class,'system'])->name("system");
Route::get("/systemitem/{id}",[\App\Http\Controllers\HomeController::class,'systemitem'])->name("systemitem");
Route::get("/downloadsystem/{id}",[\App\Http\Controllers\HomeController::class,'downloadsystem'])->name("downloadsystem");

Route::get('/home',[\App\Http\Controllers\Admin\MainController::class,'index'])->middleware('auth')->name("home");
Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function() {
    Route::get('/',[\App\Http\Controllers\Admin\MainController::class,'index'])->name('adminIndex');
    Route::resource("team",\App\Http\Controllers\Admin\TeamController::class);
    Route::resource('slider', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('about' , \App\Http\Controllers\Admin\AboutController::class);
    Route::resource('about_abouts' , \App\Http\Controllers\Admin\AboutAboutController::class);
    Route::resource('item' , \App\Http\Controllers\Admin\ItemController::class);
    Route::resource('text' , \App\Http\Controllers\Admin\TextController::class);
    Route::resource('activity' , \App\Http\Controllers\Admin\ActivityController::class);
    Route::resource('videos' , \App\Http\Controllers\Admin\VideoController::class);
    Route::resource('news' , \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('newheader' , \App\Http\Controllers\Admin\NewHeaderController::class);
    Route::resource('contacts' , \App\Http\Controllers\Admin\ContactController::class);
    Route::resource('contact_headers' , \App\Http\Controllers\Admin\ContactHeaderController::class);
    Route::resource('contact_footers' , \App\Http\Controllers\Admin\ContactFooterController::class);
    Route::resource('contact_types' , \App\Http\Controllers\Admin\ContactTypeController::class);
    Route::resource('countries' , \App\Http\Controllers\Admin\CountryController::class);
    Route::resource('card_headers' , \App\Http\Controllers\Admin\CardHeaderController::class);
    Route::resource('system_headers' , \App\Http\Controllers\Admin\SystemHeaderController::class);
    Route::resource('systems' , \App\Http\Controllers\Admin\SystemController::class);
    Route::resource('system_filters' , \App\Http\Controllers\Admin\SystemFilterController::class);
    Route::resource('system_abouts' , \App\Http\Controllers\Admin\SystemAboutController::class);
    Route::resource('system_items' , \App\Http\Controllers\Admin\SystemItemController::class);
    Route::resource('system_sliders' , \App\Http\Controllers\Admin\SystemSliderController::class);
    Route::resource('system_texts' , \App\Http\Controllers\Admin\SystemTextController::class);
    Route::resource('system_item_headers' , \App\Http\Controllers\Admin\SystemItemHeaderController::class);
    Route::resource('systemproduct' , \App\Http\Controllers\Admin\SystemProductController::class);
    Route::resource('card_abouts' , \App\Http\Controllers\Admin\CardAboutController::class);
    Route::resource('works' , \App\Http\Controllers\Admin\WorkController::class);
    Route::resource('work_items' , \App\Http\Controllers\Admin\WorkItemController::class);
    Route::resource('categories' , \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('categorynew' , \App\Http\Controllers\Admin\CategoryNewController::class);
    Route::resource('producttype', \App\Http\Controllers\Admin\ProductTypeController::class);
    Route::resource('producttypeitem', \App\Http\Controllers\Admin\ProductTypeItemController::class);
    Route::resource('download-header', \App\Http\Controllers\Admin\DownloadHeaderController::class);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('subcategory', \App\Http\Controllers\Admin\SubCategoryController::class);
    Route::resource('categorytext', \App\Http\Controllers\Admin\CategoryTextController::class);
    Route::resource('subcategoryheader', \App\Http\Controllers\Admin\SubCategoryHeaderController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('productfilter', \App\Http\Controllers\Admin\ProductFilterController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('service_texts', \App\Http\Controllers\Admin\ServiceTextController::class);
    Route::resource('service_headers', \App\Http\Controllers\Admin\ServiceHeaderController::class);
    Route::resource('service_items', \App\Http\Controllers\Admin\ServiceItemController::class);
    Route::resource('service_images', \App\Http\Controllers\Admin\ServiceImageController::class);
    Route::resource('galleryheader', \App\Http\Controllers\Admin\GalleryHeaderController::class);
    Route::resource('galleryabout', \App\Http\Controllers\Admin\GalleryAboutController::class);
    Route::resource('gallerycategory', \App\Http\Controllers\Admin\GalleryCategoryController::class);
    Route::resource('galleryitemheader', \App\Http\Controllers\Admin\GalleryItemHeaderController::class);
    Route::resource('galleryfilter', \App\Http\Controllers\Admin\GalleryFilterController::class);
    Route::resource('galleryitem', \App\Http\Controllers\Admin\GalleryItemController::class);
    Route::resource('galleryitemfooter', \App\Http\Controllers\Admin\GalleryItemFooterController::class);
    Route::resource('portfolioabout', \App\Http\Controllers\Admin\PortfolioAboutController::class);
    Route::resource('portfoliocharacter', \App\Http\Controllers\Admin\PortfolioCharacterController::class);
    Route::resource('portfolioheader', \App\Http\Controllers\Admin\PortfolioHeaderController::class);
    Route::resource('portfolioimage', \App\Http\Controllers\Admin\PortfolioImageController::class);
    Route::resource('portfolioproduct', \App\Http\Controllers\Admin\PortfolioProductController::class);
    Route::resource('galleryvideo', \App\Http\Controllers\Admin\GalleryVideoController::class);
    Route::resource('galleryvideofilter', \App\Http\Controllers\Admin\GalleryVideoFilterController::class);
    Route::resource('galleryvideofooter', \App\Http\Controllers\Admin\GalleryVideoFooterController::class);
    Route::resource('galleryvideoheader', \App\Http\Controllers\Admin\GalleryVideoHeaderController::class);
    Route::resource('downloadabout', \App\Http\Controllers\Admin\DownloadAboutController::class);
    Route::resource('downloadcategory', \App\Http\Controllers\Admin\DownloadCategoryController::class);
    Route::resource('downloadinfo', \App\Http\Controllers\Admin\DownloadInfoController::class);
    Route::resource('downloaditemfilter', \App\Http\Controllers\Admin\DownloadItemFilterController::class);
    Route::resource('downloaditemfooter', \App\Http\Controllers\Admin\DownloadItemFooterController::class);
    Route::resource('downloaditemheader', \App\Http\Controllers\Admin\DownloadItemHeaderController::class);
    Route::resource('downloaditemproduct', \App\Http\Controllers\Admin\DownloadItemProductController::class);
    Route::resource('branchheader', \App\Http\Controllers\Admin\BranchHeaderController::class);
    Route::resource('branchabout', \App\Http\Controllers\Admin\BranchAboutController::class);
    Route::resource('buypageheader', \App\Http\Controllers\Admin\BuypageHeaderController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
});

// Change language session condition
Route::get('/language/{lang}',function ($lang){
    if ($lang == 'ru' || $lang == 'uz' || $lang == "en")
    {
        $lang = strtolower($lang);
        session([
            'locale' => $lang
        ]);
    }
    return redirect()->back();
});
