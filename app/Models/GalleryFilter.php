<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class GalleryFilter extends Model
{
    use HasFactory;

    protected $table = 'galery_filter';

    protected $guarded = [];

    public function filterable(){
        return $this->morphTo();
    }

    public function parent(){
        return $this->belongsTo(GalleryFilter::class,'parent_id');
    }

    public function children(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        return $this->hasMany(GalleryFilter::class, 'parent_id', 'id')->select("id","title_$lang as title");
    }
}
