<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = [
        'category_new_id' , 'title_uz' , 'title_ru' , 'title_en' ,
        'text_uz', 'text_ru' , 'text_en' , 'slug' , 'image' , 'status'
        ];

    public function category(){
        return $this->belongsTo(Category::class,'category_new_id');
    }
}
