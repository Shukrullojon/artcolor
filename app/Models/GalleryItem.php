<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $table = 'galery_items';

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(GalleryCategory::class,'galery_id','id');
    }

    public function filter(){
        return $this->belongsTo(GalleryFilter::class,'filter_id','id');
    }
}
