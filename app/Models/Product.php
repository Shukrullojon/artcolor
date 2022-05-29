<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use HasFactory;
    public $lang = "ru";

    public function __construct(array $attributes = [])
    {
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        $this->lang = $lang;
    }

    protected $table = 'products';

    protected $guarded = [];

    public function filter(){
        return $this->belongsTo(ProductFilter::class,'filter_id','id');
    }

    public function category(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        return $this->belongsTo(SubCategory::class,'sub_category_id','id')->select("id","title_$lang as title");
    }

    public function image(){
        return $this->hasOne(ProductImage::class)->where('type',1);
    }

    public function images(){
        return $this->hasMany(ProductImage::class)->where('type',1);
    }

    public function prices(){
        return $this->hasMany(ProductPrice::class)->select("id","litr_$this->lang as litr","price_$this->lang as price");
    }

    public function characters(){
        return $this->hasMany(ProductCharacter::class)->select("id","title_$this->lang as title");
    }

    public function videos(){
        return $this->hasMany(ProductVideo::class);
    }

    public function gallery(){
        return $this->hasMany(ProductImage::class)->where('type',2);
    }

    public function downloads(){
        return $this->hasMany(ProductDownload::class)->select("id","title_$this->lang as title","file","origin","mb");
    }

}
