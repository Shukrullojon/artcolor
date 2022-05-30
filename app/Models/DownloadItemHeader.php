<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadItemHeader extends Model
{
    use HasFactory;

    protected $table = 'download_item_header';

    protected $guarded = [];
}
