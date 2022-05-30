<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadInfo extends Model
{
    use HasFactory;

    protected $table = 'download_info';

    protected $guarded = [];
}
