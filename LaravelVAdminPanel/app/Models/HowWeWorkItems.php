<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowWeWorkItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'file_id',
        'description',
    ];
}
