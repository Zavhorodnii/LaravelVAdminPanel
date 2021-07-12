<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBlocks extends Model
{
    use HasFactory;
    protected $fillable = [
        'draft',
        'post_title',
    ];
}
