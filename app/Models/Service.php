<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $guarded = [];

    public function headers(){
        return $this->hasMany(ServiceItemHeader::class);
    }
    public function items(){
        return $this->hasMany(ServiceItem::class);
    }
}
