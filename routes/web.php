<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);

Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function() {
    Route::get('/',[\App\Http\Controllers\Admin\MainController::class,'index'])->name('adminIndex');
    Route::get('/admin/create',[\App\Http\Controllers\Admin\UserController::class,'adminCreate'])->name('admincreate');
    Route::post('/admin/store',[\App\Http\Controllers\Admin\UserController::class,'adminStore'])->name('adminStore');
    Route::resource("products",\App\Http\Controllers\Admin\ProductController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
