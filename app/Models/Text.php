<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;
    protected $table = 'about_text';
    protected $fillable = ['title_uz' , 'title_ru' , 'title_en' , 'info_uz' , 'info_ru' , 'info_en' ,'additional_uz' ,'additional_ru' , 'additional_en'];
}
