<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypeItem extends Model
{
    use HasFactory;

    protected $table = 'product_type_item';

    protected $guarded = [];

    public function productType(){
        return $this->belongsTo(ProductType::class);
    }
}
