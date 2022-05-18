<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $fillable = [
        'title_uz' ,
        'title_ru' ,
        'title_en' ,
        'short_text_uz' ,
        'short_text_ru' ,
        'short_text_en' ,
        'text_uz' ,
        'text_ru' ,
        'text_en',
        'image'
    ];
}
