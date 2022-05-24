<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardHeader extends Model
{
    use HasFactory;
    protected $table = "card_header";
    protected $guarded = [];
}
