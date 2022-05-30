<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryVideo extends Model
{
    use HasFactory;

    protected $table = 'gallery_videos';

    protected $guarded = [];

    public function filter(){
        return $this->belongsTo(GalleryVideoFilter::class);
    }
}
