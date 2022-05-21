<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $table ="download_header";
    protected $fillable = ['title_uz' , 'title_ru' , 'title_en' , 'info_uz' , 'info_ru' , 'info_en' , 'image'];
}
