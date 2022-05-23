<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFilter extends Model
{
    use HasFactory;

    protected $table = 'product_filter';

    protected $guarded = [];

    public function filterable(){
        return $this->morphTo();
    }

    public function parent(){
        return $this->belongsTo(ProductFilter::class,'parent_id');
    }

}
