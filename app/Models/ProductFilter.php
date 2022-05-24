<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class ProductFilter extends Model
{
    use HasFactory;

    protected $table = 'product_filter';

    protected $guarded = [];

    public function filterable(){
        return $this->morphTo();
    }

    public function parent(){
        return $this->belongsTo(ProductFilter::class,'parent_id');
    }

    public function children(){
        $lang = strtolower(App::getLocale('locale'));
        if(strlen($lang)>2){
            $lang=substr($lang,0,2);
        }
        return $this->hasMany(ProductFilter::class, 'parent_id', 'id')->select("id","title_$lang as title");
    }

}
