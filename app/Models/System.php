<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;


    protected $table = 'systems';

    protected $guarded = [];

    public function items(){
        return $this->hasMany(SystemItem::class);
    }


}
