<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'person_name',
        'draft',
        'file_id',
        'description'
    ];
}
