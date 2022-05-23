<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [];

    public function filter(){
        return $this->belongsTo(ProductFilter::class,'filter_id','id');
    }

    public function category(){
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
}
