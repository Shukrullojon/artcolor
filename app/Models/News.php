<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = [
        'category_new_id' , 'title_uz' , 'title_ru' , 'title_en' ,
        'text_uz', 'text_ru' , 'text_en' , 'slug' , 'image' , 'status','type'
        ];

    public function category(){
        return $this->belongsTo(CategoryNew::class,'category_new_id');
    }

}
