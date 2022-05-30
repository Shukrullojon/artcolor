<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadItemFilter extends Model
{
    use HasFactory;

    protected $table = 'download_item_filter';

    protected $guarded = [];
}
