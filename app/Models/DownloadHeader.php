<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadHeader extends Model
{
    use HasFactory;

    protected $table = 'download_header';

    protected $guarded = [];
}
