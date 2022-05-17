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

    Route::resource('product-type', \App\Http\Controllers\Admin\ProductTypeController::class);


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
