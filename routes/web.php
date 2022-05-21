<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Auth::routes();

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('/about',[\App\Http\Controllers\HomeController::class,'about'])->name('about');
Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function() {
    Route::get('/',[\App\Http\Controllers\Admin\MainController::class,'index'])->name('adminIndex');

    Route::resource("team",\App\Http\Controllers\Admin\TeamController::class);
    Route::resource('slider', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('about' , \App\Http\Controllers\Admin\AboutController::class);
    Route::resource('item' , \App\Http\Controllers\Admin\ItemController::class);
    Route::resource('text' , \App\Http\Controllers\Admin\TextController::class);
    Route::resource('activity' , \App\Http\Controllers\Admin\ActivityController::class);
    Route::resource('videos' , \App\Http\Controllers\Admin\VideoController::class);
    Route::resource('news' , \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('contacts' , \App\Http\Controllers\Admin\ContactController::class);
    Route::resource('categories' , \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('product-type', \App\Http\Controllers\Admin\ProductTypeController::class);
    Route::resource('download-header', \App\Http\Controllers\Admin\DownloadHeaderController::class);

});

// Change language session condition
Route::get('/language/{lang}',function ($lang){
    if ($lang == 'ru' || $lang == 'uz' || $lang == "en")
    {
        session([
            'locale' => $lang
        ]);
    }
    return redirect()->back();
});
