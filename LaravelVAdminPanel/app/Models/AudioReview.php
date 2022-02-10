<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'city',
        'draft',
        'person_name',
        'file_id',
        'review',
    ];
}
