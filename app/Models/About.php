<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = "abouts";
    protected $fillable = [
        'title_uz' , 'title_ru' , 'title_en' ,
        'title_short_uz' , 'title_short_ru' , 'title_short_en' ,
        'text_uz' , 'text_ru' , 'text_en' ,
        'text_right_uz' , 'text_right_ru' , 'text_right_en' ,
        'image' , 'video_image' , 'video_link'
        ] ;
}
