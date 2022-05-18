<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('status',1)->get();
        return view('index',[
            'sliders' => $sliders,
        ]);
    }

    public function about(){
        return view('about');
    }
}
