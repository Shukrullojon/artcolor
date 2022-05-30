<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\System;

class SystemItem extends Model
{
    use HasFactory;

    protected $table = 'system_items';

    protected $guarded = [];

    public function system(){
        return $this->belongsTo(System::class);
    }

}
