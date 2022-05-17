<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Paginator::useBootstrapFive();
        if(!session()->has("locale")) {
            session()->put("locale", $request->getPreferredLanguage(config("translatable.locales")));
        }
        app()->setLocale(session()->get("locale"));
    }
}
