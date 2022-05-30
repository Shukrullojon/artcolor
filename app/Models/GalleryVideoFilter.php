<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class GalleryVideoFilter extends Model
{
    use HasFactory;

    protected $table = 'gallery_video_filter';

    protected $guarded = [];

    public function videos(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        return $this->hasMany(GalleryVideo::class)->select("id","title_$lang as title","image","link");
    }
}
