<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchHeader extends Model
{
    use HasFactory;

    protected $table = 'branch_header';

    protected $guarded = [];
}
