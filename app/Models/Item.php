<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'about_item';
    protected $fillable = ['title_uz' , 'title_ru' , 'title_en' , 'count'] ;
}
