<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category_new';

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
    ];

    public function news(){
        return $this->hasMany(News::class);
    }
}
